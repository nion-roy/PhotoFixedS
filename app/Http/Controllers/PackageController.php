<?php

namespace App\Http\Controllers;

use Auth;
use Session;
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
use Illuminate\Http\Request;
use App\Models\PendingOrders;
use App\Models\CompletedOrders;
use App\Models\ServiceExamples;
use App\Models\ShopItemRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PackageController extends Controller
{
    // Admin Panel Package STARTS
    public function viewPackages()
    {
        $isAdmin = Auth::user();
        $packs = Package::all();
        $packCount = Package::all()->count();

        return view('admin.packages.viewPackages', compact('isAdmin', 'packs', 'packCount'));
    }
    public function addPackage()
    {
        $isAdmin = Auth::user();
        $services = Services::all();

        return view('admin.packages.addPackage', compact('isAdmin', 'services'));
    }
    public function addingPackage(Request $req)
    {
        $pack = new Package();

        $pack->name = $req->packName;
        $pack->price = $req->packPrice;
        $pack->description = $req->packDes;
        $pack->services = json_encode($req->pServices);
        $pack->save();

        Session::flash('sess', 'Package added successfully.');
        return redirect('add-new-package');
    }
    public function editPackage($id = null)
    {
        $isAdmin = Auth::user();
        $pack = Package::find($id);
        $services = Services::all();

        return view('admin.packages.editPackage', compact('isAdmin', 'pack', 'services'));
    }
    public function updatePackage(Request $req, $id)
    {
        $pack = Package::find($id);
        $pack->name = $req->pName;
        $pack->price = $req->pPrice;
        $pack->description = $req->pDes;
        $pack->save();

        Session::flash('sess', 'Package updated successfully.');
        return redirect('view-packages');
    }
    public function deletePackage($id = null)
    {
        $pack = Package::find($id);
        $pack->delete();

        Session::flash('sess', 'Package deleted successfully.');
        return redirect('view-packages');
    }
    // Admin Panel Package ENDS

    // Front-end Pricing/Package Routes STARTS
    public function pricing()
    {
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();
        $packs = Package::all();
        $limitedExamples = ServiceExamples::limit(6)->latest()->get();
        $socials = Social::all();
        $socialsPage = SocialGroup::all()->first();
        $contacts = Contact::all()->first();

        return view('frontend.packages', compact(
            'services',
            'categories',
            'items',
            'packs',
            'limitedExamples',
            'socials',
            'contacts',
            'socialsPage'
        ));
    }
    public function viewPack($id = null)
    {
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();
        $theuser = Auth::user();
        $socials = Social::all();
        $socialsPage = SocialGroup::all()->first();
        $contacts = Contact::all()->first();

        $thepack = Package::find($id);
        $milestones = Milestone::all();

        return view('frontend.viewPack', compact(
            'services',
            'categories',
            'items',
            'thepack',
            'milestones',
            'socials',
            'contacts',
            'socialsPage'
        ));
    }
    // Front-end Pricing/Package Routes ENDS
}
