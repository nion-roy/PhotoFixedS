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
use App\Models\AboutText;

class MilestoneController extends Controller
{
    // Admin Panel About & Milestone Function STARTS
    public function viewAboutText(){
        $isAdmin = Auth::user();
        $about = AboutText::all();

        return view ('admin.about.viewAboutText', compact('isAdmin', 'about'));
    }
    public function updatingAbout(Request $req){
        $abt = AboutText::find($req->abtID);
        $abt->txt = $req->txt;
        $abt->save();

        Session::flash('sess', 'Data Updated.');
        return redirect('/view-about-text');
    }

    public function viewMilestone(){
        $isAdmin = Auth::user();
        $mls = Milestone::all();
        $mlsCount = Milestone::all()->count();

        return view('admin.milestone.viewMilestone', compact('isAdmin', 'mls', 'mlsCount'));
    }
    public function addMilestone(){
        $isAdmin = Auth::user();

        return view('admin.milestone.addMilestone', compact('isAdmin'));
    }
    public function addingMilestone(Request $req){
        $mlst = new Milestone();

        $mlst->heading = $req->heading;
        $mlst->year = $req->year;
        $mlst->details = $req->details;

        $mlst->save();

        Session::flash('sess', 'Milestone added.');
        return redirect('/add-milestone');
    }
    public function editMilestone($id=null){
        $isAdmin = Auth::user();
        $mlst = Milestone::find($id);
        return view('admin.milestone.editMilestone', compact('isAdmin', 'mlst'));
    }
    public function updateMilestone(Request $req){
        $isAdmin = Auth::user();
        $mlst = Milestone::find($req->mID);

        $mlst->heading = $req->mheading;
        $mlst->year = $req->myear;
        $mlst->details = $req->mdetails;

        $mlst->save();

        Session::flash('sess', 'Milestone updated.');
        return redirect('/view-milestone');
    }
    public function delMilestone($id){
        $isAdmin = Auth::user();
        $mlst = Milestone::find($id);
        $mlst->delete();
        Session::flash('sess', 'Milestone deleted.');
        return redirect('/view-milestone');
    }
    // Admin Panel About & Milestone Function ENDS
}
