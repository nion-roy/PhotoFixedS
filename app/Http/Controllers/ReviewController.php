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

class ReviewController extends Controller
{
    // Admin Panel Review Routes STARTS
    public function viewReviews(){
        $isAdmin = Auth::user();
        $revs = Review::all();
        $revCount = Review::all()->count();

        return view('admin.review.viewReviews', compact('isAdmin', 'revs', 'revCount'));
    }
    public function addReview(){
        $isAdmin = Auth::user();
        $services = Services::all();
        return view('admin.review.addReview', compact('isAdmin', 'services'));
    }
    public function addingReview(Request $req){
        $rev = new Review();

        $rev->rating = $req->rating;
        $rev->service = $req->service;
        $rev->postBy = $req->postBy;
        if($req->reviewBy == null){
            $rev->reviewBy = "Anonymous";
        }
        else{
            $rev->reviewBy = $req->reviewBy;
        }
        if($req->hasFile('reviewerImg')){
            $file1 = $req->file('reviewerImg');
            $ext1 = $file1->getClientOriginalExtension();
            $filename1 = $req->reviewBy."_".rand().".".$ext1;
            $file1->move('asset/reviews/reviewerImg/', $filename1);
            $fileDir1 = "asset/reviews/reviewerImg/".$filename1;
            $rev->reviewerImg = $fileDir1;
        }
        else{
            $rev->reviewerImg = "https://rugby.vlaanderen/wp-content/uploads/2018/03/Anonymous-Profile-pic.jpg";
        }
        $rev->review = $req->review;

        $rev->save();

        Session::flash('sess', 'Review added successfully.');
        return redirect()->back();
    }
    public function removeReview($id=null){
        $theRev = Review::find($id);
        $imgPath = $theRev->reviewerImg;
        if(File::exists($imgPath)){
            File::delete($imgPath);
        }
        $theRev->delete();

        Session::flash('sess', 'Review removed successfully.');
        return redirect('/view-reviews');
    }
    // Admin Panel Review Routes ENDS
}
