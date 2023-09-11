<?php

namespace App\Http\Controllers;

use App\Models\SocialGroup;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SocialGroupController extends Controller
{
  public function viewSocialPage()
  {
    $isAdmin = Auth::user();
    $pages = SocialGroup::all();
    return view('admin.social-page.index', compact('isAdmin', 'pages'));
  }
  public function addSocialPage()
  {
    $isAdmin = Auth::user();
    return view('admin.social-page.create', compact('isAdmin'));
  }
  public function addingSocialPage(Request $req)
  {
    $sld = new SocialGroup();
    $sld->name = $req->name;
    $sld->page = $req->page;
    $sld->save();

    Session::flash('sess', 'Social page added.');
    return redirect('/add-social-page');
  }
  public function editSocialPage(string $id)
  {
    $isAdmin = Auth::user();
    $pageGroup = SocialGroup::findOrFail($id);
    return view('admin.social-page.edit', compact('isAdmin', 'pageGroup'));
  }

  public function updateSocialPage(Request $req, string $id)
  {
    $sld = SocialGroup::findOrFail($id);
    $sld->name = $req->name;
    $sld->page = $req->page;
    $sld->save();

    Session::flash('sess', 'Social page link update.');
    return redirect('/view-social-page');
  }
  public function delSocialPage(string $id)
  {
    $sld = SocialGroup::findOrFail($id);
    $sld->delete();

    Session::flash('sess', 'Social Page link deleted.');
    return redirect('/view-social-page');
  }
}
