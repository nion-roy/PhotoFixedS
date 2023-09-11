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

class CompletedOrdersController extends Controller
{
    // Admin Panel Orders STARTS
    public function viewCompletedOrders()
    {
        $isAdmin = Auth::user();
        $cOrders = CompletedOrders::all();
        $cOrderCount = CompletedOrders::all()->count();

        return view('admin.orders.viewCompletedOrders', compact('isAdmin', 'cOrders', 'cOrderCount'));
    }
    public function viewComOrderDetails($id = null)
    {
        $isAdmin = Auth::user();
        $comOrder = CompletedOrders::find($id);

        return view('admin.orders.complterOrderDetails', compact('isAdmin', 'comOrder'));
    }
    public function approveOrder($id = null)
    {
        $isAdmin = Auth::user();
        $order = CompletedOrders::find($id);

        return view('admin.orders.orderApproval', compact('isAdmin', 'order'));
    }
    public function confirmPayment(Request $req)
    {
        $isAdmin = Auth::user();

        $theorder = CompletedOrders::find($req->orderID);
        $theorder->approval = "Yes";
        $theorder->payment = $req->payment;
        $theorder->save();

        return redirect('/completed-orders');
    }
    public function disapproveOrder($id = null)
    {
        $order = CompletedOrders::find($id);
        $order->approval = "No";
        $order->payment = 0;
        $order->save();
        return redirect('/completed-orders');
    }
    // Admin Panel Orders ENDS

    // Front-end Orders STARTS
    public function myCompletedOrders($id = null)
    {
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();

        $uInfo = User::find($id);
        $cOrders = CompletedOrders::where('userID', '=', $uInfo->id)->get();
        $cOrderCount = $cOrders->count();
        $socials = Social::all();
        $socialsPage = SocialGroup::all()->first();
        $contacts = Contact::all()->first();

        return view('frontend.myCompletedOrders', compact(
            'services',
            'categories',
            'items',
            'uInfo',
            'cOrders',
            'cOrderCount',
            'socials',
            'contacts',
            'socialsPage'
        ));
    }
    public function myPendingOrders($id = null)
    {
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();

        $uInfo = User::find($id);
        $pOrders = PendingOrders::where('userID', '=', $uInfo->id)->get();
        $pOrderCount = $pOrders->count();

        return view('frontend.myPendingOrder', compact('services', 'categories', 'items', 'uInfo', 'pOrders', 'pOrderCount'));
    }
    public function viewFrontendOrder($id = null)
    {
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();

        $ord = CompletedOrders::find($id);

        return view('frontend.viewFrondendOrder', compact('services', 'categories', 'items', 'ord'));
    }
    public function downloadCompletedPhoto($id = null)
    {
        $order = CompletedOrders::find($id);

        $file = $order->editedImgDir;
        return Response::download($file);
    }
    // Front-end Orders ENDS

    // Fron-end Example STARTS
    public function examples()
    {
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();
        $examples = ServiceExamples::all()->sortByDesc("id");
        $serviceCount = Services::all()->count();
        $exampleCount = ServiceExamples::all()->count();
        $socials = Social::all();
        $socialsPage = SocialGroup::all()->first();
        $contacts = Contact::all()->first();

        return view('frontend.examples', compact(
            'services',
            'categories',
            'items',
            'serviceCount',
            'examples',
            'exampleCount',
            'socials',
            'contacts',
            'socialsPage'
        ));
    }
    // Fron-end Example ENDS

    // Admin Panel Orders STARTS
    public function usersCompletedOrder($id = null)
    {
        $isAdmin = Auth::user();
        $getUser = User::find($id);
        $cOrd = CompletedOrders::where('userID', $id)->get();

        return view('admin.orders.userCompletedOrder', compact('isAdmin', 'getUser', 'cOrd'));
    }
    // Admin Panel Orders ENDS
}
