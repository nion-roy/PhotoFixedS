<?php

namespace App\Http\Controllers;

use Storage;
use Response;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Review;
use App\Models\Social;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Sliders;
use App\Models\Services;
use App\Models\Milestone;
use App\Models\ShopItems;
use App\Models\Categories;
use App\Models\SocialGroup;
use App\Models\UserPackage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PendingOrders;
use App\Models\CompletedOrders;
use App\Models\ServiceExamples;
use App\Models\ShopItemRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ServicesController extends Controller
{
  // Admin Panel Service STARTS
  public function viewServices()
  {
    $isAdmin = Auth::user();
    $services = Services::all();
    $serviceCount = Services::all()->count();

    return view('admin.services.viewServices', compact('isAdmin', 'services', 'serviceCount'));
  }
  public function addService()
  {
    $isAdmin = Auth::user();
    $packs = Package::all();

    return view('admin.services.addService', compact('isAdmin', 'packs'));
  }
  public function addingService(Request $req)
  {
    $newServ = new Services();
    if ($req->hasFile('sImg')) {
      if ($req->hasFile('sSlider1')) {
        if ($req->hasFile('sSlider2')) {
          $file = $req->file('sImg');
          $ext = $file->getClientOriginalExtension();
          $filename = rand() . "." . $ext;
          $file->move('asset/services/serviceImg/', $filename);
          $fileDir = "asset/services/serviceImg/" . $filename;
          $newServ->imgDir = $fileDir;

          $slider1 = $req->file('sSlider1');
          $ext1 = $slider1->getClientOriginalExtension();
          $slidername1 = rand() . "." . $ext1;
          $slider1->move('asset/slider/services/', $slidername1);
          $sliderDir1 = "asset/slider/services/" . $slidername1;
          $newServ->sliderDir1 = $sliderDir1;

          $slider2 = $req->file('sSlider2');
          $ext2 = $slider2->getClientOriginalExtension();
          $slidername2 = rand() . "." . $ext2;
          $slider2->move('asset/slider/services/', $slidername2);
          $sliderDir2 = "asset/slider/services/" . $slidername2;
          $newServ->sliderDir2 = $sliderDir2;

          $newServ->name = $req->sName;
          $newServ->price = $req->sPrice;
          if ($req->sDiscount == null) {
            $newServ->discount = '0';
          } else {
            $newServ->discount = $req->sDiscount;;
          }
          $newServ->freeOne = $req->freeServ;
          $newServ->description = $req->sDescription;
          $newServ->save();
          Session::flash('sess', 'Service added successfully.');
        }
      }
    } else {
      Session::flash('sess', 'Sorry something happened.');
    }

    return redirect('add-new-service');
  }
  public function editService($id = null)
  {
    $isAdmin = Auth::user();
    $serv = Services::find($id);
    $packs = Package::all();

    return view('admin.services.editService', compact('isAdmin', 'serv', 'packs'));
  }
  public function updateService(Request $req, $id)
  {
    $service = Services::find($id);
    $service->name = $req->sName;
    $service->price = $req->sPrice;
    $service->discount = $req->sDiscount;
    $service->freeOne = $req->freeServ;
    $service->description = $req->description;
    if ($req->hasFile('sImg')) {
      $imgPath = $service->imgDir;
      if (File::exists($imgPath)) {
        File::delete($imgPath);
      }
      $file = $req->file('sImg');
      $ext = $file->getClientOriginalExtension();
      $filename = rand() . "." . $ext;
      $file->move('asset/services/serviceImg/', $filename);
      $fileDir = "asset/services/serviceImg/" . $filename;
      $service->imgDir = $fileDir;
    }

    if ($req->hasFile('slider1')) {
      $imgPath = $service->sliderDir1;
      if (File::exists($imgPath)) {
        File::delete($imgPath);
      }
      $file = $req->file('slider1');
      $ext = $file->getClientOriginalExtension();
      $filename = rand() . "." . $ext;
      $file->move('asset/slider/services/', $filename);
      $fileDir = "asset/slider/services/" . $filename;
      $service->sliderDir1 = $fileDir;
    }

    if ($req->hasFile('slider2')) {
      $imgPath = $service->sliderDir2;
      if (File::exists($imgPath)) {
        File::delete($imgPath);
      }
      $file = $req->file('slider2');
      $ext = $file->getClientOriginalExtension();
      $filename = rand() . "." . $ext;
      $file->move('asset/slider/services/', $filename);
      $fileDir = "asset/slider/services/" . $filename;
      $service->sliderDir2 = $fileDir;
    }
    $service->save();

    Session::flash('sess', 'Service updated successfully.');
    return redirect('view-services');
  }
  public function deleteService($id = null)
  {
    $serv = Services::find($id);

    $imgPath = $serv->imgDir;
    if (File::exists($imgPath)) {
      File::delete($imgPath);
    }
    $slider1 = $serv->sliderDir1;
    if (File::exists($slider1)) {
      File::delete($slider1);
    }
    $slider2 = $serv->sliderDir2;
    if (File::exists($slider2)) {
      File::delete($slider2);
    }

    $serv->delete();

    Session::flash('sess', 'Service deleted successfully.');
    return redirect('view-services');
  }
  // Admin Panel Service ENDS

  // Front-end Service STARTS
  public function frontendService($id = null)
  {
    $services = Services::all();
    $categories = Categories::all();
    $items = ShopItems::all();

    $service = Services::find($id);
    $theUser = Auth::user();
    $comOrders = CompletedOrders::where('service', $service->name)->get();
    $comOrderCount = CompletedOrders::where('service', $service->name)->count();

    $examples = ServiceExamples::where('service', $service->name)->get();
    $exampleCount = ServiceExamples::where('service', $service->name)->count();

    $photos = Gallery::where('servName', $service->name)->get();
    $galleryCount = Gallery::where('servName', $service->name)->count();

    $sname = $service->name;
    $allPacks = Package::where('services', 'LIKE', '%' . $sname . '%')->get();
    $allpackCount = count($allPacks);

    $reviews = Review::where('service', $sname)->limit(6)->latest()->get();
    $reviewCount = count($reviews);
    $socials = Social::all();
    $socialsPage = SocialGroup::all()->first();
    $contacts = Contact::all()->first();
    $sliders = Sliders::all();

    return view('frontend.frontendService', compact(
      'services',
      'categories',
      'items',
      'service',
      'theUser',
      'comOrders',
      'comOrderCount',
      'photos',
      'galleryCount',
      'examples',
      'exampleCount',
      'allPacks',
      'allpackCount',
      'reviews',
      'reviewCount',
      'socials',
      'contacts',
      'socialsPage',
      'sliders'
    ));
  }
  public function photoUpload()
  {
    $services = Services::all();
    $categories = Categories::all();
    $items = ShopItems::all();
    $socials = Social::all();
    $socialsPage = SocialGroup::all()->first();
    $contacts = Contact::all()->first();

    $theUser = Auth::user();

    return view('frontend.photoUpload', compact(
      'services',
      'categories',
      'items',
      'theUser',
      'socials',
      'contacts',
      'socialsPage'
    ));
  }
  public function tryFree()
  {
    $services = Services::all();
    $categories = Categories::all();
    $items = ShopItems::all();
    $theUser = Auth::user();
    $socials = Social::all();
    $socialsPage = SocialGroup::all()->first();
    $contacts = Contact::all()->first();

    $freeServices = Services::where('freeOne', '=', "Yes")->get();
    $otherServices = Services::where('freeOne', '!=', "Yes")->get();

    $limitedExamples = ServiceExamples::limit(6)->latest()->get();
    $reviews = Review::limit(6)->latest()->get();
    $reviewCount = Review::all()->count();

    return view('frontend.tryforfree', compact(
      'services',
      'categories',
      'items',
      'theUser',
      'freeServices',
      'otherServices',
      'limitedExamples',
      'reviews',
      'reviewCount',
      'socials',
      'contacts',
      'socialsPage'
    ));
  }
  public function viewFreeService($id = null)
  {
    $services = Services::all();
    $categories = Categories::all();
    $items = ShopItems::all();
    $socials = Social::all();
    $socialsPage = SocialGroup::all()->first();
    $contacts = Contact::all()->first();

    $service = Services::find($id);
    $theUser = Auth::user();

    return view('frontend.viewFreeService', compact(
      'services',
      'categories',
      'items',
      'service',
      'theUser',
      'socials',
      'contacts',
      'socialsPage'
    ));
  }
  // Front-end Service ENDS
}
