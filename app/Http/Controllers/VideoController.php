<?php

namespace App\Http\Controllers;

use Storage;
use Response;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Review;
use App\Models\Video;;

use App\Models\Gallery;
use App\Models\Package;
use App\Models\Sliders;
use App\Models\Services;
use App\Models\Milestone;
use App\Models\ShopItems;
use App\Models\AboutText;;

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

class VideoController extends Controller
{
	public function videoSettings()
	{
		$isAdmin = Auth::user();
		$vdos = Video::all();

		return view('admin.video.videoSettings', compact('isAdmin', 'vdos'));
	}
	public function updateVideo(Request $req)
	{
		$vdo = Video::find($req->vdoID);
		$vdo->txt = $req->txt;
		$vdo->link = $req->link;
		$vdo->save();

		Session::flash('sess', 'Video Updated.');
		return redirect('/video-settings');
	}
}
