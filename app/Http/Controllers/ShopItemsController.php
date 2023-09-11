<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Storage;
use Response;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Review;
use App\Models\Social;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Sliders;
use App\Models\Services;
use App\Models\Milestone;
use App\Models\ShopItems;
use App\Models\Categories;
use App\Models\SocialGroup;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use App\Models\PendingOrders;
use App\Models\CompletedOrders;
use App\Models\ServiceExamples;
use App\Models\ShopItemRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ShopItemsController extends Controller
{
    // Admin Panel Shop Items STARTS
    public function viewItems()
    {
        $isAdmin = Auth::user();
        $categories = Categories::all();
        $items = ShopItems::all();
        $itemCount = ShopItems::all()->count();

        return view('admin.shop.viewItems', compact('isAdmin', 'categories', 'items', 'itemCount'));
    }
    public function addItem()
    {
        $isAdmin = Auth::user();
        $categories = Categories::all();

        return view('admin.shop.addItem', compact('isAdmin', 'categories'));
    }
    public function addingItem(Request $req)
    {
        $newItem = new ShopItems();
        $newItem->name = $req->iName;
        $newItem->category = $req->iCategory;
        $newItem->price = $req->iPrice;
        if ($req->hasFile('iImg')) {
            $file = $req->file('iImg');
            $ext = $file->getClientOriginalExtension();
            $filename = rand() . "." . $ext;
            $file->move('asset/shop/itemImg/', $filename);
            $fileDir = "asset/shop/itemImg/" . $filename;

            $newItem->img = $fileDir;
        }
        $newItem->itemLink = $req->iLink;
        $newItem->save();

        Session::flash('sess', 'Item added successfully.');
        return redirect('add-new-item');
    }
    public function editItem($id = null)
    {
        $isAdmin = Auth::user();
        $cate = Categories::all();
        $itm = ShopItems::find($id);

        return view('admin.shop.editItem', compact('isAdmin', 'cate', 'itm'));
    }
    public function updateItem(Request $req, $id)
    {
        $item = ShopItems::find($id);
        $item->name = $req->iName;
        $item->category = $req->iCate;
        $item->price = $req->iPrice;
        $item->itemLink = $req->iLink;
        if ($req->hasFile('iImg')) {
            $imgPath = $item->img;
            if (File::exists($imgPath)) {
                File::delete($imgPath);
            }
            $file = $req->file('iImg');
            $ext = $file->getClientOriginalExtension();
            $filename = $req->iName . "." . $ext;
            $file->move('asset/shop/itemImg/', $filename);
            $fileDir = "asset/shop/itemImg/" . $filename;
            $item->img = $fileDir;
        }
        $item->save();

        Session::flash('sess', 'Item updated successfully.');
        return redirect('view-items');
    }
    public function deleteItem($id = null)
    {
        $item = ShopItems::find($id);
        $imgPath = $item->img;
        if (File::exists($imgPath)) {
            File::delete($imgPath);
        }
        $item->delete();

        Session::flash('sess', 'Item deleted successfully.');
        return redirect('view-items');
    }
    // Admin Panel Shop Items ENDS

    // Fron-end Shop Items STARTS
    public function getItem($id = null)
    {
        if (Auth::user() == NULL) {
            Session::flash('sess', 'Please log in first.');
            return redirect('login');
        } else {
            $services = Services::all();
            $categories = Categories::all();
            $items = ShopItems::all();
            $uInfo = Auth::user();

            $itm = ShopItems::find($id);
            $milestones = Milestone::all();
            $socials = Social::all();
            $socialsPage = SocialGroup::all()->first();
            $contacts = Contact::all()->first();

            // $theReq = DB::select('select * from shop_item_requests where userID = ? and itemID = ?', [Auth::user()->id, $id]);
            $theReq = ShopItemRequest::where('userID', Auth::user()->id)->where('itemID', $itm->id)->latest()->first();

            return view('frontend.getItem', compact(
                'services',
                'categories',
                'items',
                'uInfo',
                'itm',
                'theReq',
                'milestones',
                'socials',
                'contacts',
                'socialsPage'
            ));
        }
    }
    // Fron-end Shop Items ENDS
}
