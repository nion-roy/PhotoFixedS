<?php

namespace App\Http\Controllers;

use Storage;
use Response;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Review;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Sliders;
use App\Models\Services;
use App\Models\Milestone;
use App\Models\ShopItems;
use App\Models\Categories;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use App\Models\PendingOrders;
use App\Models\CompletedOrders;
use App\Models\ServiceExamples;
use App\Models\ShopItemRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Bus\DispatchesJobs;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $isAdmin = Auth::user();
    return view('welcome', compact('isAdmin'));
  }


  // Custom Functions STARTS
  public function picFixHome()
  {
    return view('welcome');
  }

  public function adminPanel()
  {
    $isAdmin = Auth::user();
    $userCount = User::where('is_admin', '=', NULL)->orWhere('is_admin', '!=', 1)->get()->count();
    $pendingOrderCount = PendingOrders::all()->count();
    $completedOrderCount = CompletedOrders::all()->count();
    $serviceCount = Services::all()->count();
    $packCount = Package::all()->count();
    $itemCount = ShopItems::all()->count();

    return view('admin.admin_panel', compact('isAdmin', 'userCount', 'pendingOrderCount', 'completedOrderCount', 'serviceCount', 'packCount', 'itemCount'));
  }
  // Custom Functions ENDS

  // Front-end User Profile STARTS
  public function userprofile($id = null)
  {
    $services = Services::all();
    $categories = Categories::all();
    $items = ShopItems::all();

    $cOrderCount = CompletedOrders::where('userID', Auth::user()->id)->count();
    $pOrderCount = PendingOrders::where('userID', Auth::user()->id)->count();

    return view('frontend.userprofile', compact('services', 'categories', 'items', 'cOrderCount', 'pOrderCount'));
  }
  public function editProfile($id = null)
  {
    $services = Services::all();
    $categories = Categories::all();
    $items = ShopItems::all();

    $getUser = User::find($id);

    return view('frontend.editProfile', compact('services', 'categories', 'items', 'getUser'));
  }
  public function updateProfile(Request $req)
  {
    $theUser = User::find($req->id);

    $theUser->name = $req->name;
    $theUser->email = $req->email;

    $theUser->save();

    Session::flash('sess', 'Profile updated successfully.');
    return redirect('/user-profile/' . $theUser->id);
  }
  // Front-end User Profile ENDS

  // Admin Panel Favicon Function STARTS
  public function changeFavicon()
  {
    $isAdmin = Auth::user();
    return view('admin.favicon.changeFavicon', compact('isAdmin'));
  }
  // public function updateFavicon(Request $req){
  //     if($req->hasFile('favi')){
  //         $imgPath =  asset('favicon.ico');
  //         if(File::exists($imgPath)){
  //             File::delete($imgPath);
  //         }
  //         $file = $req->file('favi');
  //         $ext = $file->getClientOriginalExtension();
  //         $filename = "favicon.ico";
  //         $file->move('/', $filename);

  //         Session::flash('sess', 'Favicon changed successfully.');
  //         return redirect('/change-favicon');
  //     }
  // }
  public function updateFavicon(Request $req)
  {
    if ($req->hasFile('favi')) {
      $imgPath =  'favicon.ico';
      if (file_exists($imgPath)) {
        File::delete($imgPath);
      }
      $file = $req->file('favi');
      $ext = $file->getClientOriginalExtension();
      $filename = "favicon.ico";
      $file->move(public_path(), $filename);

      Session::flash('sess', 'Favicon changed successfully.');
      return redirect('/change-favicon');
    }
  }
  // Admin Panel Favicon Function ENDS
}
