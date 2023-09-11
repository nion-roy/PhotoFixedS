<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Response;
use Storage;
use Redirect;
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

class ShopItemRequestController extends Controller
{
    // Front-end Shop Items STARTS
    public function sendReq(Request $req){
        $uID = $req->userID;
        $iID = $req->itemID;

        $findReq = ShopItemRequest::where('itemID', '=', $iID)->where('userID', '=', $uID)->latest()->first();
        if($findReq != Null){
            $filename = $findReq->transactionImg;
            if(File::exists($filename)){
                File::delete($filename);
            }
            $findReq->delete();
        }

        $itemReq = new ShopItemRequest();

        $itemReq->userID = $req->userID;
        $itemReq->userName = $req->userName;
        $itemReq->itemID = $req->itemID;
        $itemReq->itemName = $req->itemName;
        $itemReq->price = $req->itemPrice;
        $itemReq->date = Carbon::now();;
        $itemReq->status = "pending";
        $itemReq->transactionTxt = $req->transactionTxt;
        if($req->hasFile('transactionImg')){
            $file = $req->file('transactionImg');
            $ext = $file->getClientOriginalExtension();
            $filename = rand().".".$ext;
            $file->move('asset/transaction/transactionImg/', $filename);
            $fileDir = "asset/transaction/transactionImg/".$filename;
            $itemReq->transactionImg = $fileDir;
        }

        $itemReq->save();

        Session::flash('sess', 'Request sent successfully.');
        return redirect('/get-the-item/'.$req->itemID);
        
    }
    public function downloadItem($id=null){
        $ureq = ShopItems::find($id);
        $fileLink = $ureq->itemLink;

        return redirect()->away($fileLink);
    }
    // Front-end Shop Items ENDS
 
    // Admin Panel Shop Items STARTS 
    public function viewItemReq(){
        $isAdmin = Auth::user();
        $reqs = ShopItemRequest::all();
        $reqsCount = ShopItemRequest::all()->count();

        return view('admin.shop.viewItemReq', compact('isAdmin', 'reqs', 'reqsCount'));
    }
    public function viewReq($id){
        $isAdmin = Auth::user();
        $request = ShopItemRequest::find($id);

        return view('admin.shop.viewReq', compact('isAdmin', 'request'));
    }
    public function acceptReq($id=null){
        $isAdmin = Auth::user();
        $thereq = ShopItemRequest::find($id);
        $thereq->status = "accepted";
        $thereq->save();

        return redirect('/view-item-requests');
    }
    public function rejectReq($id=null){
        $isAdmin = Auth::user();
        $thereq = ShopItemRequest::find($id);
        $thereq->status = "rejected";
        $thereq->save();

        return redirect('/view-item-requests');
    }
    // Admin Panel Shop Items ENDS

    // Front-end Shop Item STARTS
    public function myItemReqs($id=null){
        $req = ShopItemRequest::where('userID', $id)->get();
        $reqCount = count($req);
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();

        return view('frontend.myReqs', compact('req', 'reqCount', 'services', 'categories', 'items'));
    }
    public function cancelReq($id=null){
        $a = ShopItemRequest::find($id);

        $userid = $a->userID;

        $imgPath = $a->transactionImg;
        if(File::exists($imgPath)){
            File::delete($imgPath);
        }

        $a->delete();

        Session::flash('sess', 'Request canceled.');
        return redirect('/my-item-requests/'.$userid);
    }
    public function viewMyReq($id){
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();

        $theReq = ShopItemRequest::find($id);
        $getItem = ShopItems::find($theReq->itemID);

        return redirect($getItem->itemLink);
    }
    // Front-end Shop Item ENDS
}
