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

class PendingOrdersController extends Controller
{
    // Admin Panel Orders STARTS
    public function viewPendingOrders(){
        $isAdmin = Auth::user();
        $pOrders = PendingOrders::all();
        $pOrderCount = PendingOrders::all()->count();

        return view('admin.orders.viewPendingOrders', compact('isAdmin', 'pOrders', 'pOrderCount'));
    }
    public function viewOrder($id=null){
        $isAdmin = Auth::user();
        $pOrd = PendingOrders::find($id);

        return view('admin.orders.viewTheOrder', compact('isAdmin', 'pOrd'));
    }
    public function deleteOrder($id=null){
        $theOrder = PendingOrders::find($id);
        
        $imgPath = $theOrder->orderImgDir;
        if(File::exists($imgPath)){
            // File::delete($imgPath);
        }
        $theOrder->delete();
        
        Session::flash('sess', 'Order canceled.');
        return redirect('pending-orders');
    }
    public function downloadPhoto($id=null){
        $order = PendingOrders::find($id);

        $file = $order->orderImgDir;
        return Response::download($file);
    }
    public function finishOrder($id=null){
        $isAdmin = Auth::user();
        $order = PendingOrders::find($id);

        return view('admin.orders.finishOrder', compact('isAdmin', 'order'));
    }
    public function submitOrder(Request $req){
        $cmp = new CompletedOrders();

        if($req->hasFile('thePhoto')){
            $file = $req->file('thePhoto');
            $ext = $file->getClientOriginalExtension();
            $filename = $req->useremail."_".$req->userid."_".$req->title."_(".rand().").".$ext;
            $file->move('asset/uploads/completed/', $filename);
            $fileDir = "asset/uploads/completed/".$filename;
            $cmp->editedImgDir = $fileDir;
            $cmp->prevOrderID = $req->prevorderid;
            $cmp->title = $req->title;
            $cmp->service = $req->service;
            if($req->userPackID == null){
                $cmp->packID = "0";
            }
            else{
                $cmp->packID = $req->userPackID;
            }

            if($req->userPackName == null){
                $cmp->packName = " ";
            }
            else{
                $cmp->packName = $req->userPackName;
            }

            $cmp->userID = $req->userid;
            $cmp->userEmail = $req->useremail;
            $cmp->editorID = $req->editorid;
            $cmp->editorEmail = $req->editoremail;
            $cmp->completedDate = Carbon::now();
            $cmp->approval = "No";
            $cmp->payment = 0;
            
            $pendingOrder = PendingOrders::find($req->prevorderid);
            $imgPath = $pendingOrder->orderImgDir;
            if(File::exists($imgPath)){
                // File::delete($imgPath);
                $cmp->uneditedImgDir = $imgPath;
            }
            else{
                Session::flash('sess', 'Error! Order could not be submitted..'); 
            }

            $cmp->save();
            $pendingOrder->delete();

            Session::flash('sess', 'Order submitted successfully.');
        }
        else{
            Session::flash('sess', 'Sorry something happened.'); 
        }

        return redirect('pending-orders');
    }
    // Admin Panel Orders ENDS

    // Front-end Orders STARTS
    public function uploadPhoto(Request $req){
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();
        $service = Services::find($req->userviceID);
        $theUser = Auth::user();

        $newPhoto = new PendingOrders();

        if($req->hasFile('pic')){
            $file = $req->file('pic');
            $ext = $file->getClientOriginalExtension();
            $filename = $req->uemail."_".$theUser->id."_".$req->title."_(".rand().").".$ext;
            $file->move('asset/uploads/pending/', $filename);
            $fileDir = "asset/uploads/pending/".$filename;
            $newPhoto->orderImgDir = $fileDir;

            $rules = [
                'title' => 'required | max:50',
            ];
    
            $msg = [
                "title.required" => "You haven't entered any title. Please enter a title.",
                "title.max" => "Your order title must not exceed 50 characters.",
            ];
            $this->validate($req, $rules, $msg);
    
            $newPhoto->title = $req->title;
            $newPhoto->service = $req->uservice;
            $newPhoto->userID = $req->uid;
            $newPhoto->userEmail = $req->uemail;
            $newPhoto->orderDate = Carbon::now();
            $newPhoto->description = $req->pref;
            $newPhoto->freeOrder = $req->freeOrder;

            if($theUser->uPackID != NULL){
                $newPhoto->userPackID = $theUser->uPackID;
            }
            if($theUser->uPackName != NULL){
                $newPhoto->userPackName = $theUser->uPackName;
            }

            $newPhoto->save();
    
            $getUser = User::find($req->uid);

            if($req->freeOrder == "Yes"){
                $getUser->freeUsed = "1";
            }
            $getUser->save();
    
            Session::flash('sess', 'Your photo uploaded successfully.');
        }
    
        else{
            Session::flash('sess', 'Sorry, something went wrong.');
        }

        return redirect('/service/'.$service->id);
    }
    public function editFrontendOrder($id=null){
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();

        $theUser = Auth::user();

        $order = PendingOrders::find($id);

        return view('frontend.editFrontendOrder', compact('services', 'categories', 'items', 'theUser', 'order'));
    }
    public function updateFrontendOrder(Request $req, $id){
        $pndOrder = PendingOrders::find($id);

        $pndOrder->title = $req->oTitle;
        $pndOrder->service = $req->oService;
        $pndOrder->orderDate = $req->oDes;
        $pndOrder->orderDate = Carbon::now();
        if($req->hasFile('oImg')){
            $imgPath = $pndOrder->orderImgDir;
            if(File::exists($imgPath)){
                File::delete($imgPath);
            }
            $file = $req->file('oImg');
            $ext = $file->getClientOriginalExtension();
            $filename = $req->oEmail."_".$req->uID."_".$req->oTitle."_(".rand().").".$ext;
            $file->move('asset/uploads/pending/', $filename);
            $fileDir = "asset/uploads/pending/".$filename;
            $pndOrder->orderImgDir = $fileDir;
        }
        $pndOrder->save();

        Session::flash('sess', 'Order updated successfully.');
        return redirect('/my-pending-orders/'.$req->uID);
    }
    public function deleteFrontendOrder($id=null){
        $theUser = Auth::user();

        $theOrder = PendingOrders::find($id);
        
        $imgPath = $theOrder->orderImgDir;
        if(File::exists($imgPath)){
            File::delete($imgPath);
        }
        $theOrder->delete();

        Session::flash('sess', 'You have canceled your order.');
        return redirect('/my-pending-orders/'.$theUser->id);
    }
    public function photoUploading(Request $req){
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();
        $theUser = Auth::user();
        $newPhoto = new PendingOrders();

        if($req->hasFile('photo')){
            $file = $req->file('photo');
            $ext = $file->getClientOriginalExtension();
            $filename = $req->uemail."_".$theUser->id."_".$req->title."_(".rand().").".$ext;
            $file->move('asset/uploads/pending/', $filename);
            $fileDir = "asset/uploads/pending/".$filename;
            $newPhoto->orderImgDir = $fileDir;

            $rules = [
                'title' => 'required | max:50',
            ];
    
            $msg = [
                "title.required" => "You haven't entered any title. Please enter a title.",
                "title.max" => "Your order title must not exceed 50 characters.",
            ];
            $this->validate($req, $rules, $msg);

            $newPhoto->title = $req->title;
            $newPhoto->userID = $req->uid;
            $newPhoto->userEmail = $req->uemail;
            $newPhoto->orderDate = Carbon::now();
            $newPhoto->description = $req->preferences;

            if($theUser->uPackID != NULL){
                $newPhoto->userPackID = $theUser->uPackID;
            }
            if($theUser->uPackName != NULL){
                $newPhoto->userPackName = $theUser->uPackName;
            }

            $theService = Services::find($req->service);
            $newPhoto->service = $theService->name;
            if($theService->freeOne == "Yes"){
                $newPhoto->freeOrder = $req->freeOrder;
            }
            else{
                $newPhoto->freeOrder = "No";
            }
            $newPhoto->save();

            $getUser = User::find($req->uid);
            if($req->freeOrder == "Yes"){
                $getUser->freeUsed = "1";
            }
            $getUser->save();

            Session::flash('sess', 'Your photo uploaded successfully.');
        }
        else{
            Session::flash('sess', 'Sorry, something went happened.');
        }

        return redirect('/photo-upload');
    }
    // Front-end Orders ENDS

    // Admin Panel Orders STARTS
    public function usersPendingOrder($id=null){
        $isAdmin = Auth::user();
        $getUser = User::find($id);
        $pOrd = PendingOrders::where('userID', $id)->get();

        return view('admin.orders.userPendingOrder', compact('isAdmin', 'getUser', 'pOrd'));
    }
    // Admin Panel Orders ENDS
}
