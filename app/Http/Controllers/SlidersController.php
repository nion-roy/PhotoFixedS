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

class SlidersController extends Controller
{
  // Admin Panel Sliders Functions STARTS
  public function viewSliders()
  {
    $isAdmin = Auth::user();
    $sliders = Sliders::all();
    $slidersCount = Sliders::all()->count();

    return view('admin.sliders.allSliders', compact('isAdmin', 'sliders', 'slidersCount'));
  }
  public function addSlider()
  {
    $isAdmin = Auth::user();

    return view('admin.sliders.addSlider', compact('isAdmin'));
  }
  public function addingSlider(Request $req)
  {
    $sld = new Sliders();
    if ($req->hasFile('slider')) {
      $file = $req->file('slider');
      $ext = $file->getClientOriginalExtension();
      $filename = "HomeSlider_" . rand() . "." . $ext;
      $file->move('asset/slider/home/', $filename);
      $fileDir = "asset/slider/home/" . $filename;
      $sld->img = $fileDir;
    }
    $sld->save();

    Session::flash('sess', 'Slider added.');
    return redirect('/add-slider');
  }
  public function delSlider($id = null)
  {
    $sld = Sliders::find($id);
    $imgPath = $sld->img;
    if (File::exists($imgPath)) {
      File::delete($imgPath);
    }
    $sld->delete();

    Session::flash('sess', 'Slider deleted.');
    return redirect('/view-sliders');
  }
  // Admin Panel Sliders Functions ENDS
}
