<?php

namespace App\Http\Controllers;

use Storage;
use Response;
use Carbon\Carbon;
use App\Models\Blog;
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
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PendingOrders;
use App\Models\CompletedOrders;
use App\Models\ServiceExamples;
use App\Models\ShopItemRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['blogs', 'singleBlog']);
    }

    // backend starts
    public function viewBlogs()
    {
        $isAdmin = Auth::user();
        $blogs = Blog::all();
        $blogCount = Blog::all()->count();
        return view('admin.blog.viewBlog', compact('blogs', 'blogCount', 'isAdmin'));
    }

    public function addBlog()
    {
        $isAdmin = Auth::user();
        return view('admin.blog.addBlog', compact('isAdmin'));
    }

    public function viewSingle($id = null)
    {
        $isAdmin = Auth::user();
        $blog = Blog::find($id);
        return view('admin.blog.singleBlog', compact('blog', 'isAdmin'));
    }

    public function editBlog($id = null)
    {
        $isAdmin = Auth::user();
        $blog = Blog::find($id);
        return view('admin.blog.editBlog', compact('blog', 'isAdmin'));
    }

    public function submitBlog(Request $req)
    {
        $newBlog = new Blog();
        if ($req->hasFile('thumbnail')) {
            if ($req->hasFile('banner')) {
                if ($req->hasFile('img_1')) {

                    $file1 = $req->file('thumbnail');
                    $ext1 = $file1->getClientOriginalExtension();
                    $filename1 = rand() . "." . $ext1;
                    $file1->move('asset/blogs/blogimage/', $filename1);
                    $thumb = "asset/blogs/blogimage/" . $filename1;
                    $newBlog->thumbnail = $thumb;

                    $file2 = $req->file('banner');
                    $ext2 = $file2->getClientOriginalExtension();
                    $filename2 = rand() . "." . $ext2;
                    $file2->move('asset/blogs/blogimage/', $filename2);
                    $ban = "asset/blogs/blogimage/" . $filename2;
                    $newBlog->banner = $ban;

                    $file3 = $req->file('img_1');
                    $ext3 = $file3->getClientOriginalExtension();
                    $filename3 = rand() . "." . $ext3;
                    $file3->move('asset/blogs/blogimage/', $filename3);
                    $img1 = "asset/blogs/blogimage/" . $filename3;
                    $newBlog->img_1 = $img1;

                    if ($req->hasFile('img_2')) {
                        $file4 = $req->file('img_2');
                        $ext4 = $file4->getClientOriginalExtension();
                        $filename4 = rand() . "." . $ext4;
                        $file4->move('asset/blogs/blogimage/', $filename4);
                        $img2 = "asset/blogs/blogimage/" . $filename4;
                        $newBlog->img_2 = $img2;
                    }

                    if ($req->hasFile('img_3')) {
                        $file5 = $req->file('img_3');
                        $ext5 = $file5->getClientOriginalExtension();
                        $filename5 = rand() . "." . $ext5;
                        $file5->move('asset/blogs/blogimage/', $filename5);
                        $img3 = "asset/blogs/blogimage/" . $filename5;
                        $newBlog->img_3 = $img3;
                    }

                    $newBlog->title = $req->title;
                    $newBlog->short_description = $req->short_des;
                    $newBlog->des_1 = $req->des_1;
                    $newBlog->des_2 = $req->des_2;
                    $newBlog->des_3 = $req->des_3;

                    $newBlog->save();
                    Session::flash('sess', 'Blog added successfully.');
                }
            }
        } else {
            Session::flash('sess', 'Sorry something happened.');
        }
        return redirect('add-new-blog');
    }

    public function updateBlog(Request $req)
    {
        $id = $req->bID;
        $blog = Blog::find($id);

        $blog->title = $req->title;
        $blog->short_description = $req->short_des;
        $blog->des_1 = $req->des_1;
        $blog->des_2 = $req->des_2;
        $blog->des_3 = $req->des_3;

        if ($req->hasFile('thumbnail')) {
            $imgPath = $blog->thumbnail;
            if (File::exists($imgPath)) {
                File::delete($imgPath);
            }
            $file = $req->file('thumbnail');
            $ext = $file->getClientOriginalExtension();
            $filename = rand() . "." . $ext;
            $file->move('asset/blogs/blogimage/', $filename);
            $fileDir = "asset/blogs/blogimage/" . $filename;
            $blog->thumbnail = $fileDir;
        }

        if ($req->hasFile('banner')) {
            $imgPath = $blog->banner;
            if (File::exists($imgPath)) {
                File::delete($imgPath);
            }
            $file = $req->file('banner');
            $ext = $file->getClientOriginalExtension();
            $filename = rand() . "." . $ext;
            $file->move('asset/blogs/blogimage/', $filename);
            $fileDir = "asset/blogs/blogimage/" . $filename;
            $blog->banner = $fileDir;
        }

        if ($req->hasFile('img_1')) {
            $imgPath = $blog->img_1;
            if (File::exists($imgPath)) {
                File::delete($imgPath);
            }
            $file = $req->file('img_1');
            $ext = $file->getClientOriginalExtension();
            $filename = rand() . "." . $ext;
            $file->move('asset/blogs/blogimage/', $filename);
            $fileDir = "asset/blogs/blogimage/" . $filename;
            $blog->img_1 = $fileDir;
        }

        if ($req->hasFile('img_2')) {
            $imgPath = $blog->img_2;
            if (File::exists($imgPath)) {
                File::delete($imgPath);
            }
            $file = $req->file('img_2');
            $ext = $file->getClientOriginalExtension();
            $filename = rand() . "." . $ext;
            $file->move('asset/blogs/blogimage/', $filename);
            $fileDir = "asset/blogs/blogimage/" . $filename;
            $blog->img_2 = $fileDir;
        }

        if ($req->hasFile('img_3')) {
            $imgPath = $blog->img_3;
            if (File::exists($imgPath)) {
                File::delete($imgPath);
            }
            $file = $req->file('img_3');
            $ext = $file->getClientOriginalExtension();
            $filename = rand() . "." . $ext;
            $file->move('asset/blogs/blogimage/', $filename);
            $fileDir = "asset/blogs/blogimage/" . $filename;
            $blog->img_3 = $fileDir;
        }

        $blog->save();

        Session::flash('sess', 'Service updated successfully.');
        return redirect()->back();
    }

    public function deleteBlog($id = null)
    {
        $blog = Blog::find($id);

        $thumb = $blog->thumbnail;
        if (File::exists($thumb)) {
            File::delete($thumb);
        }

        $ban = $blog->banner;
        if (File::exists($ban)) {
            File::delete($ban);
        }

        $img1 = $blog->img_1;
        if (File::exists($img1)) {
            File::delete($img1);
        }

        $img2 = $blog->img_2;
        if (File::exists($img2)) {
            File::delete($img2);
        }

        $img3 = $blog->img_3;
        if (File::exists($img3)) {
            File::delete($img3);
        }

        $blog->delete();

        Session::flash('sess', 'Service deleted successfully.');
        return redirect()->back();
    }

    // backend ends

    // frontend starts

    public function blogs()
    {
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();
        $blogs = Blog::latest()->paginate(7);
        $socials = Social::all();
        $socialsPage = SocialGroup::all()->first();
        $contacts = Contact::all()->first();

        return view('frontend.blogs', compact(
            'services',
            'categories',
            'items',
            'blogs',
            'socials',
            'contacts',
            'socialsPage'
        ));
    }

    public function singleBlog($id = null)
    {
        $services = Services::all();
        $categories = Categories::all();
        $items = ShopItems::all();
        $blog = Blog::find($id);

        return view('frontend.blogSingle', compact('services', 'categories', 'items', 'blog'));
    }

    // frontend ends

}
