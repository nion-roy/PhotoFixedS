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

class GalleryController extends Controller
{
    // Admin Panel Gallery Functions STARTS
    public function galleryAllPhotos(){
        $isAdmin = Auth::user();

        $photos = Gallery::all();
        $galleryCount = Gallery::all()->count();

        return view('admin.gallery.allPhotos', compact('isAdmin', 'photos', 'galleryCount'));
    }
    public function galleryAddPhotos(){
        $isAdmin = Auth::user();
        $services = Services::all();

        return view('admin.gallery.addPhoto', compact('isAdmin', 'services'));
    }
    public function galleryAddingPhotos(Request $req){
        $newPhoto = new Gallery();

        $newPhoto->servName = $req->service;
        if($req->hasFile('photo')){
            $file = $req->file('photo');
            $ext = $file->getClientOriginalExtension();
            $filename = rand().".".$ext;
            $file->move('asset/gallery/gallService/', $filename);
            $fileDir = "asset/gallery/gallService/".$filename;
            $newPhoto->photoDir = $fileDir;
        }

        $newPhoto->save();
        Session::flash('sess', 'Photo added to the gallery.');

        return redirect('/gallery-add-photos');
    }
    public function galleryEditPhoto($id=null){
        $isAdmin = Auth::user();
        $thephoto = Gallery::find($id);
        $services = Services::all();

        return view('admin.gallery.editPhoto', compact('isAdmin', 'thephoto', 'services'));
    }
    public function galleryUpdatePhoto(Request $req, $id){
        $photo = Gallery::find($id);
        if($req->hasFile('pPhoto')){
            $imgPath = $photo->photoDir;
            if(File::exists($imgPath)){
                File::delete($imgPath);
            }
            $file = $req->file('pPhoto');
            $ext = $file->getClientOriginalExtension();
            $filename = rand().".".$ext;
            $file->move('asset/gallery/gallService/', $filename);
            $fileDir = "asset/gallery/gallService/".$filename;
            $photo->photoDir = $fileDir;
        }
        $photo->servName = $req->pService;

        $photo->save();
        Session::flash('sess', 'Photo updated successfully.');

        return redirect('/gallery-all-photos');
    }
    public function galleryDeletePhoto($id=null){
        $photo = Gallery::find($id);
        $imgPath = $photo->photoDir;
        if(File::exists($imgPath)){
            File::delete($imgPath);
        }
        $photo->delete();

        Session::flash('sess', 'Photo deleted successfully.');
        return redirect('/gallery-all-photos');
    }
    // Admin Panel Gallery Functions ENDS
}
