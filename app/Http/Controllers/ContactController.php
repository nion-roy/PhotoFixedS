<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Models\Contact;
use App\Models\Services;
use App\Models\ShopItems;
use App\Models\Categories;
use App\Models\SocialGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function viewAddress()
    {
        $isAdmin = Auth::user();
        $contacts = Contact::all();
        return view('admin.address.index', compact('isAdmin', 'contacts'));
    }
    public function addAddress()
    {
        $isAdmin = Auth::user();
        return view('admin.address.create', compact('isAdmin'));
    }
    public function addingAddress(Request $req)
    {
        $contact = new Contact();
        $contact->number = $req->number;
        $contact->email = $req->email;
        $contact->address = $req->address;
        $contact->iframe = $req->iframe;
        $contact->save();

        Session::flash('sess', 'Address added.');
        return redirect('/address-add');
    }
    public function editAddress(string $id)
    {
        $isAdmin = Auth::user();
        $contacts = Contact::findOrFail($id);
        return view('admin.address.edit', compact('isAdmin', 'contacts'));
    }

    public function updateAddress(Request $req, string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->number = $req->number;
        $contact->email = $req->email;
        $contact->address = $req->address;
        $contact->iframe = $req->iframe;
        $contact->save();

        Session::flash('sess', 'Address update.');
        return redirect('/address');
    }
    public function delAddress(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        Session::flash('sess', 'Address deleted.');
        return redirect('/address');
    }

    // End backend

    // Frontend view

    public function contact()
    {
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();
        $socials = Social::all();
        $socialsPage = SocialGroup::all()->first();
        $contacts = Contact::all()->first();

        return view('frontend.contact', compact('contacts', 'services', 'categories', 'items', 'socials', 'socialsPage'));
    }
}
