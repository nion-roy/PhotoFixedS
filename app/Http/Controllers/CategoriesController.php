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

class CategoriesController extends Controller
{
    public function viewCategories(){
        $isAdmin = Auth::user();
        $categories = Categories::all();
        $categoryCount = Categories::all()->count();

        return view('admin.shop.viewCategories', compact('isAdmin', 'categories', 'categoryCount'));
    }
    public function addCategory(){
        $isAdmin = Auth::user();

        return view('admin.shop.addCategory', compact('isAdmin'));
    }
    public function addingCategory(Request $req){
        $newCate = new Categories();
        if($req->hasFile('cImg')){
            $file = $req->file('cImg');
            $ext = $file->getClientOriginalExtension();
            $filename = rand().".".$ext;
            $file->move('asset/shop/categoryImg/', $filename);
            $fileDir = "asset/shop/categoryImg/".$filename;

            $newCate->imgDir = $fileDir;
            $newCate->name = $req->cName;
            
            $newCate->save();

            Session::flash('sess', 'Category added successfully.');
        }
        else{
            Session::flash('sess', 'Sorry something happened.'); 
        }

        return redirect('add-new-category');
    }
    public function editCategory($id=null){
        $isAdmin = Auth::user();
        $cate = Categories::find($id);

        return view('admin.shop.editCategory', compact('isAdmin', 'cate'));
    }
    public function updateCategory(Request $req, $id){
        $cate = Categories::find($id);
        $cate->name = $req->cName;
        if($req->hasFile('cImg')){
            $imgPath = $cate->imgDir;
            if(File::exists($imgPath)){
                File::delete($imgPath);
            }
            $file = $req->file('cImg');
            $ext = $file->getClientOriginalExtension();
            $filename = $req->sName.".".$ext;
            $file->move('asset/shop/categoryImg/', $filename);
            $fileDir = "asset/shop/categoryImg/".$filename;
        }
        $cate->save();

        Session::flash('sess', 'Category updated successfully.');
        return redirect('view-categories');
    }
    public function deleteCategory($id=null){
        $cate = Categories::find($id);
        $imgPath = $cate->imgDir;
        if(File::exists($imgPath)){
            File::delete($imgPath);
        }
        $cate->delete();

        Session::flash('sess', 'Category deleted successfully.');
        return redirect('view-categories');
    }
}
