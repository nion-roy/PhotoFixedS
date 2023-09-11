<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Response;
use Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\CompletedOrders;
use App\Models\PendingOrders;
use App\Models\Services;
use App\Models\ShopItems;
use App\Models\Package;
use App\Models\User;
use App\Models\UserPackage;
use App\Models\ShopItemRequest;
use App\Models\Gallery;
use App\Models\ServiceExamples;
use App\Models\Review;
use App\Models\Milestone;
use App\Models\Sliders;

class UserPackageController extends Controller
{
    // Front-end Package STARTS
    public function getPack(Request $req){
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all(); 

        $theuser = User::find($req->userID);

        if(Auth::user()->uPackID == NULL){
            $regPack = new UserPackage();
        }
        else{
            $thepack = UserPackage::where('userID', '=', Auth::user()->id);
            $thepack->delete();
            $regPack = new UserPackage();
        }

        $regPack->date = Carbon::now();
        $regPack->userID = $req->userID;
        $regPack->userName = $req->userName;
        $regPack->packID = $req->packID;
        $regPack->packName = $req->packName;
        $regPack->status = "pending";

        $theuser->uPackID = $req->packID;
        $theuser->uPackName = $req->packName;
        $theuser->packStatus = "pending";

        $regPack->save();
        $theuser->save();

        Session::flash('sess', 'Your request has been sent successfully. Please for the confirmation from admin.');
        return redirect('/pricing');
    }
    // Front-end Package ENDS

    // Admin Panel Package STARTS
    public function packReq(){
        $isAdmin = Auth::user();
        $userpackages = UserPackage::all();
        $userpackagesCount = UserPackage::all()->count();

        return view('admin.packages.viewPackReq', compact('isAdmin', 'userpackages', 'userpackagesCount'));
    }
    public function approveReq($id=null){
        $isAdmin = Auth::user();
        $userpack = UserPackage::find($id);
        $theuser = User::find($userpack->userID);

        $userpack->status = "approved";
        $theuser->packStatus = "registered";

        $userpack->save();
        $theuser->save();

        return redirect('/package-requests');
    }
    public function disapproveReq($id=null){
        $isAdmin = Auth::user();
        $userpack = UserPackage::find($id);
        $theuser = User::find($userpack->userID);

        $userpack->status = "pending";
        $theuser->packStatus = "pending";

        $userpack->save();
        $theuser->save();

        return redirect('/package-requests');
    }
    // Admin Panel Package ENDS
}
