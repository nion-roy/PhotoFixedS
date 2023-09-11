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

class ServiceExamplesController extends Controller
{
    // Admin Panel Example Functions STARTS
    public function viewExamples(){
        $isAdmin = Auth::user();
        $servExCount = ServiceExamples::all()->count();
        $servEx = ServiceExamples::all();

        return view('admin.services.viewExample', compact('isAdmin', 'servExCount', 'servEx'));
    }
    public function addExample(){
        $isAdmin = Auth::user();
        $services = Services::all();
        return view('admin.services.addExample', compact('isAdmin', 'services'));
    }
    public function addingExample(Request $req){
        $abc = new ServiceExamples();

        if($req->hasFile('imgBefore')){
            $file1 = $req->file('imgBefore');
            $ext1 = $file1->getClientOriginalExtension();
            $filename1 = $req->service."_".rand().".".$ext1;
            $file1->move('asset/services/exampleImg/before/', $filename1);
            $fileDir1 = "asset/services/exampleImg/before/".$filename1;
            $abc->before = $fileDir1;
        }
        if($req->hasFile('imgAfter')){
            $file2 = $req->file('imgAfter');
            $ext2 = $file2->getClientOriginalExtension();
            $filename2 = $req->service."_".rand().".".$ext2;
            $file2->move('asset/services/exampleImg/after/', $filename2);
            $fileDir2 = "asset/services/exampleImg/after/".$filename2;
            $abc->after = $fileDir2;
        }
        $abc->service = $req->service;
        $abc->description = $req->des;

        $abc->save();

        Session::flash('sess', 'Example added successfully.');
        return redirect('/add-example');
    }
    public function editExample($id=null){
        $isAdmin = Auth::user();
        $services = Services::all();
       
        $xmpl = ServiceExamples::find($id);

        return view('admin.services.editExample', compact('isAdmin', 'services', 'xmpl'));
    }
    public function updateExample(Request $req){
        $getEx = ServiceExamples::find($req->xID);

        $getEx->service = $req->xService;
        $getEx->description = $req->xDes;
        if($req->hasFile('xBefore')){
            $imgPath1 = $getEx->before;
            if(File::exists($imgPath1)){
                File::delete($imgPath1);
            }

            $file1 = $req->file('xBefore');
            $ext1 = $file1->getClientOriginalExtension();
            $filename1 = $req->xService."_".rand().".".$ext1;
            $file1->move('asset/services/exampleImg/before/', $filename1);
            $fileDir1 = "asset/services/exampleImg/before/".$filename1;
            $getEx->before = $fileDir1;
        }
        if($req->hasFile('xAfter')){
            $imgPath2 = $getEx->after;
            if(File::exists($imgPath2)){
                File::delete($imgPath2);
            }

            $file2 = $req->file('xAfter');
            $ext2 = $file2->getClientOriginalExtension();
            $filename2 = $req->xService."_".rand().".".$ext2;
            $file2->move('asset/services/exampleImg/after/', $filename2);
            $fileDir2 = "asset/services/exampleImg/after/".$filename2;
            $getEx->after = $fileDir2;
        }

        $getEx->save();

        Session::flash('sess', 'Example updated successfully.');
        return redirect('/view-examples');
    }
    public function delExample($id=null){
        $example = ServiceExamples::find($id);

        $imgBefore = $example->before;
        if(File::exists($imgBefore)){
            File::delete($imgBefore);
        }

        $imgAfter = $example->after;
        if(File::exists($imgAfter)){
            File::delete($imgAfter);
        }

        $example->delete();

        Session::flash('sess', 'Example deleted successfully.');
        return redirect('/view-examples');
    }
    // Admin Panel Example Functions ENDS
}
