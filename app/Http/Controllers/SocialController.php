<?php

namespace App\Http\Controllers;

use App\Models\Social;;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SocialController extends Controller
{
	public function viewSocial()
	{
		$isAdmin = Auth::user();
		$socials = Social::all();
		return view('admin.social.index', compact('isAdmin', 'socials'));
	}

	public function addSocial()
	{
		$isAdmin = Auth::user();
		return view('admin.social.create', compact('isAdmin'));
	}

	public function addingSocial(Request $req)
	{
		$sld = new Social();
		$sld->name = $req->name;
		$sld->link = $req->link;
		$sld->icon = $req->icon;
		$sld->save();

		Session::flash('sess', 'Social link added.');
		return redirect('/add-social');
	}

	public function editSocial(string $id)
	{
		$isAdmin = Auth::user();
		$socials = Social::findOrFail($id);
		return view('admin.social.edit', compact('isAdmin', 'socials'));
	}

	public function updateSocial(Request $req, string $id)
	{
		$sld = Social::find($id);
		$sld->name = $req->name;
		$sld->link = $req->link;
		$sld->icon = $req->icon;
		$sld->save();

		Session::flash('sess', 'Social link update.');
		return redirect('/view-social');
	}

	public function delSocial(string $id)
	{
		$sld = Social::findOrFail($id);
		$sld->delete();

		Session::flash('sess', 'Social link deleted.');
		return redirect('/view-social');
	}
}
