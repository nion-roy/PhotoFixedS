<?php

use App\Models\User;
use App\Models\Video;
use App\Models\Review;
use App\Models\Social;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Sliders;
use App\Models\Services;
use App\Models\AboutText;
use App\Models\Milestone;
use App\Models\ShopItems;
use App\Models\Categories;
use App\Models\SocialGroup;
use App\Models\PendingOrders;
use App\Models\CompletedOrders;
use App\Models\ServiceExamples;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\ShopItemsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SocialGroupController;
use App\Http\Controllers\UserPackageController;
use App\Http\Controllers\FrontendOrderController;
use App\Http\Controllers\PendingOrdersController;
use App\Http\Controllers\UploadedPhotosController;
use App\Http\Controllers\CompletedOrdersController;
use App\Http\Controllers\ServiceExamplesController;
use App\Http\Controllers\ShopItemRequestController;

Route::get('/', function () {
  return redirect('home');
})->name('home');
Route::get('/home', function () {
  $services = Services::all();
  $categories = Categories::all();
  $items = ShopItems::all();
  $comOrders = CompletedOrders::all();
  $userCount = User::where('is_admin', NULL)->count();
  $serviceCount = Services::all()->count();
  $examples = ServiceExamples::all();
  $exampleCount = ServiceExamples::all()->count();
  $pOrderCount = PendingOrders::all()->count();
  $cOrderCount = CompletedOrders::all()->count();
  $orderCount = $pOrderCount + $cOrderCount;
  $reviews = Review::limit(6)->latest()->get();
  $reviewCount = Review::all()->count();
  $limitedExamples = ServiceExamples::limit(6)->latest()->get();
  $milestones = Milestone::all()->sortByDesc("id");
  $sliders = Sliders::all();
  $slidersCount = Sliders::all()->count();
  $about = AboutText::all();
  $vdos = Video::all();
  $socials = Social::all();
  $socialsPage = SocialGroup::all()->first();
  $contacts = Contact::all()->first();

  return view('welcome', compact(
    'services',
    'categories',
    'items',
    'comOrders',
    'userCount',
    'serviceCount',
    'examples',
    'exampleCount',
    'pOrderCount',
    'cOrderCount',
    'orderCount',
    'reviews',
    'reviewCount',
    'limitedExamples',
    'milestones',
    'sliders',
    'slidersCount',
    'about',
    'vdos',
    'socials',
    'contacts',
    'socialsPage'
  ));
})->name('index');

Auth::routes();

Route::get('/admin-panel', [HomeController::class, 'adminPanel'])->name('adminPanel');

// Admin Panel Packages Routes STARTS
Route::get('/view-packages', [PackageController::class, 'viewPackages'])->name('viewPackages');
Route::get('/add-new-package', [PackageController::class, 'addPackage'])->name('addPackage');
Route::post('/adding-package', [PackageController::class, 'addingPackage'])->name('addingPackage');
Route::get('/edit-package/{id}', [PackageController::class, 'editPackage'])->name('editPackage');
Route::post('/update-package/{id}', [PackageController::class, 'updatePackage'])->name('updatePackage');
Route::get('/delete-package/{id}', [PackageController::class, 'deletePackage'])->name('deletePackage');

Route::get('/package-requests', [UserPackageController::class, 'packReq'])->name('packReq');
Route::get('/approve-request/{id}', [UserPackageController::class, 'approveReq'])->name('approveReq');
Route::get('/disapprove-request/{id}', [UserPackageController::class, 'disapproveReq'])->name('disapproveReq');
// Admin Panel Packages Routes ENDS

// Admin Panel Services Routes STARTS
Route::get('/view-services', [ServicesController::class, 'viewServices'])->name('viewServices');
Route::get('/add-new-service', [ServicesController::class, 'addService'])->name('addService');
Route::post('/adding-service', [ServicesController::class, 'addingService'])->name('addingService');
Route::get('/edit-service/{id}', [ServicesController::class, 'editService'])->name('editService');
Route::post('/update-service/{id}', [ServicesController::class, 'updateService'])->name('updateService');
Route::get('/delete-service/{id}', [ServicesController::class, 'deleteService'])->name('deleteService');
// Admin Panel Services Routes ENDS

// Admin Panel Shop Routes STARTS
Route::get('/view-categories', [CategoriesController::class, 'viewCategories'])->name('viewCategories');
Route::get('/add-new-category', [CategoriesController::class, 'addCategory'])->name('addCategory');
Route::post('/adding-category', [CategoriesController::class, 'addingCategory'])->name('addingCategory');
Route::get('/edit-category/{id}', [CategoriesController::class, 'editCategory'])->name('editCategory');
Route::post('/update-category/{id}', [CategoriesController::class, 'updateCategory'])->name('updateCategory');
Route::get('/delete-category/{id}', [CategoriesController::class, 'deleteCategory'])->name('deleteCategory');
Route::get('/view-items', [ShopItemsController::class, 'viewItems'])->name('viewItems');
Route::get('/add-new-item', [ShopItemsController::class, 'addItem'])->name('addItem');
Route::post('/adding-item', [ShopItemsController::class, 'addingItem'])->name('addingItem');
Route::get('/edit-item/{id}', [ShopItemsController::class, 'editItem'])->name('editItem');
Route::post('/update-item/{id}', [ShopItemsController::class, 'updateItem'])->name('updateItem');
Route::get('/delete-item/{id}', [ShopItemsController::class, 'deleteItem'])->name('deleteItem');
// Admin Panel Shop Routes ENDS

// Admin Panel Orders Routes STARTS
Route::get('/completed-orders', [CompletedOrdersController::class, 'viewCompletedOrders'])->name('viewCompletedOrders');
Route::get('/pending-orders', [PendingOrdersController::class, 'viewPendingOrders'])->name('viewPendingOrders');
Route::get('/view-order/{id}', [PendingOrdersController::class, 'viewOrder'])->name('viewOrder');
Route::get('/cancel-order/{id}', [PendingOrdersController::class, 'deleteOrder'])->name('deleteOrder');
Route::get('/download-photo/{id}', [PendingOrdersController::class, 'downloadPhoto'])->name('downloadPhoto');
Route::get('/finish-order/{id}', [PendingOrdersController::class, 'finishOrder'])->name('finishOrder');
Route::post('/submit-order', [PendingOrdersController::class, 'submitOrder'])->name('submitOrder');
Route::get('/approve-order/{id}', [CompletedOrdersController::class, 'approveOrder'])->name('approveOrder');
Route::get('/disapprove-order/{id}', [CompletedOrdersController::class, 'disapproveOrder'])->name('disapproveOrder');
Route::post('/confirm-payment', [CompletedOrdersController::class, 'confirmPayment'])->name('confirmPayment');

Route::get('/completed-orders/{id}', [CompletedOrdersController::class, 'usersCompletedOrder'])->name('usersCompletedOrder');
Route::get('/pending-orders/{id}', [PendingOrdersController::class, 'usersPendingOrder'])->name('usersPendingOrder');
// Admin Panel Orders Routes ENDS

// Admin Panel Blog Routes STARTS
Route::get('/view-blogs', [BlogController::class, 'viewBlogs'])->name('ViewBlogs');
Route::get('/add-new-blog', [BlogController::class, 'addBlog'])->name('AddBlogs');
Route::get('/view-single-blog/{id}', [BlogController::class, 'viewSingle'])->name('ViewSingle');
Route::get('/edit-blog/{id}', [BlogController::class, 'editBlog'])->name('EditBlogs');
Route::post('/submit-blog', [BlogController::class, 'submitBlog'])->name('submitBlog');
Route::post('/update-blog', [BlogController::class, 'updateBlog'])->name('updateBlog');
Route::get('/delete-blog/{id}', [BlogController::class, 'deleteBlog'])->name('deleteBlog');
// Admin Panel Blog Routes ENDS

// Front-end Service Routes STARTS
Route::get('/service/{id}', [ServicesController::class, 'frontendService'])->name('frontendService');
Route::post('/upload-photo', [PendingOrdersController::class, 'uploadPhoto'])->name('uploadPhoto');
Route::get('/view-order-details/{id}', [CompletedOrdersController::class, 'viewComOrderDetails'])->name('viewComOrderDetails');
Route::get('/my-completed-orders/{id}', [CompletedOrdersController::class, 'myCompletedOrders'])->name('myCompletedOrders');
Route::get('/my-pending-orders/{id}', [CompletedOrdersController::class, 'myPendingOrders'])->name('myPendingOrders');
Route::get('/view-frontend-order/{id}', [CompletedOrdersController::class, 'viewFrontendOrder'])->name('viewFrontendOrder');
Route::get('/downloade-completed-photo/{id}', [CompletedOrdersController::class, 'downloadCompletedPhoto'])->name('downloadCompletedPhoto');
Route::get('/edit-frontend-order/{id}', [PendingOrdersController::class, 'editFrontendOrder'])->name('editFrontendOrder');
Route::post('/update-frontend-order/{id}', [PendingOrdersController::class, 'updateFrontendOrder'])->name('updateFrontendOrder');
Route::get('/cancel-frontend-order/{id}', [PendingOrdersController::class, 'deleteFrontendOrder'])->name('deleteFrontendOrder');
// Front-end Service Routes ENDS

// Front-end Item Requests Routes STARTS
Route::get('/my-item-requests/{id}', [ShopItemRequestController::class, 'myItemReqs'])->name('myItemReqs');
Route::get('/cancel-request/{id}', [ShopItemRequestController::class, 'cancelReq'])->name('cancelReq');
Route::get('/view-req/{id}', [ShopItemRequestController::class, 'viewMyReq'])->name('viewMyReq');
// Front-end Item Requests Routes ENDS

// Front-end Upload Photo Routes STARTS
Route::get('/photo-upload', [ServicesController::class, 'photoUpload'])->name('photoUpload');
Route::post('/photo-uploading', [PendingOrdersController::class, 'photoUploading'])->name('photoUploading');
// Front-end Upload Photo Routes ENDS

// Front-end Try for Free Routes STARTS
Route::get('/try-for-free', [ServicesController::class, 'tryFree'])->name('tryFree');
Route::get('/view-free-service/{id}', [ServicesController::class, 'viewFreeService'])->name('viewFreeService');
// Front-end Try for Free Routes ENDS

// Front-end Pricing Routes STARTS
Route::get('/pricing', [PackageController::class, 'pricing'])->name('pricing');
Route::get('/view-the-package/{id}', [PackageController::class, 'viewPack'])->name('viewPack');
Route::post('/get-package', [UserPackageController::class, 'getPack'])->name('getPack');
// Front-end Pricing Routes ENDS

// Front-end Example Routes STARTS
Route::get('/examples', [CompletedOrdersController::class, 'examples'])->name('examples');
// Front-end Example Routes ENDS

// Front-end Shop Items Routes STARTS
Route::get('/get-the-item/{id}', [ShopItemsController::class, 'getItem'])->name('getItem');
Route::post('/send-request', [ShopItemRequestController::class, 'sendReq'])->name('sendReq');
Route::get('/download-item/{id}', [ShopItemRequestController::class, 'downloadItem'])->name('downloadItem');
// Front-end Shop Items Routes ENDS

// Admin Panel Shop Items Routes STARTS
Route::get('/view-item-requests', [ShopItemRequestController::class, 'viewItemReq'])->name('viewItemReq');
Route::get('/view-request/{id}', [ShopItemRequestController::class, 'viewReq'])->name('viewReq');
Route::get('/accept-request/{id}', [ShopItemRequestController::class, 'acceptReq'])->name('acceptReq');
Route::get('/reject-request/{id}', [ShopItemRequestController::class, 'rejectReq'])->name('rejectReq');
// Admin Panel Shop Items Routes ENDS

// Front-end User Profile Routes STARTS
Route::get('/user-profile/{id}', [HomeController::class, 'userprofile'])->name('userprofile');
Route::get('/edit-profile/{id}', [HomeController::class, 'editProfile'])->name('editProfile');
Route::post('/update-profile', [HomeController::class, 'updateProfile'])->name('updateProfile');
// Front-end User Profile Routes ENDS

// Admin Panel Gallery Routes STARTS
Route::get('/gallery-all-photos', [GalleryController::class, 'galleryAllPhotos'])->name('galleryAllPhotos');
Route::get('/gallery-add-photos', [GalleryController::class, 'galleryAddPhotos'])->name('galleryAddPhotos');
Route::post('/gallery-adding-photos', [GalleryController::class, 'galleryAddingPhotos'])->name('galleryAddingPhotos');
Route::get('/edit-photo/{id}', [GalleryController::class, 'galleryEditPhoto'])->name('galleryEditPhoto');
Route::post('/update-photo/{id}', [GalleryController::class, 'galleryUpdatePhoto'])->name('galleryUpdatePhoto');
Route::get('/delete-photo/{id}', [GalleryController::class, 'galleryDeletePhoto'])->name('galleryDeletePhoto');
// Admin Panel Gallery Routes ENDS

// Admin Panel Example Routes STARTS
Route::get('/view-examples', [ServiceExamplesController::class, 'viewExamples'])->name('viewExamples');
Route::get('/add-example', [ServiceExamplesController::class, 'addExample'])->name('addExample');
Route::post('/adding-example', [ServiceExamplesController::class, 'addingExample'])->name('addingExample');
Route::get('/edit-example/{id}', [ServiceExamplesController::class, 'editExample'])->name('editExample');
Route::post('/update-example', [ServiceExamplesController::class, 'updateExample'])->name('updateExample');
Route::get('/delete-example/{id}', [ServiceExamplesController::class, 'delExample'])->name('delExample');
// Admin Panel Example Routes ENDS

// Admin Panel Favicon Routes STARTS
Route::get('/change-favicon', [HomeController::class, 'changeFavicon'])->name('changeFavicon');
Route::post('/update-favicon', [HomeController::class, 'updateFavicon'])->name('updateFavicon');
// Admin Panel Favicon Routes ENDS

// Admin Panel Review Routes STARTS
Route::get('/view-reviews', [ReviewController::class, 'viewReviews'])->name('viewReviews');
Route::get('/add-review', [ReviewController::class, 'addReview'])->name('addReview');
Route::post('/adding-review', [ReviewController::class, 'addingReview'])->name('addingReview');
Route::get('/remove-review/{id}', [ReviewController::class, 'removeReview'])->name('removeReview');
// Admin Panel Review Routes ENDS

// Admin Panel About & Milestone Routes STARTS
Route::get('/view-about-text', [MilestoneController::class, 'viewAboutText'])->name('viewAboutText');
Route::post('/update-about-text', [MilestoneController::class, 'updatingAbout'])->name('updatingAbout');

Route::get('/view-milestone', [MilestoneController::class, 'viewMilestone'])->name('viewMilestone');
Route::get('/add-milestone', [MilestoneController::class, 'addMilestone'])->name('addMilestone');
Route::post('/adding-milestone', [MilestoneController::class, 'addingMilestone'])->name('addingMilestone');
Route::get('/edit-milestone/{id}', [MilestoneController::class, 'editMilestone'])->name('editMilestone');
Route::post('/update-milestone', [MilestoneController::class, 'updateMilestone'])->name('updateMilestone');
Route::get('/delete-milestone/{id}', [MilestoneController::class, 'delMilestone'])->name('delMilestone');
// Admin Panel About & Milestone Routes ENDS

// Admin Panel Sliders Routes STARTS
Route::get('/view-sliders', [SlidersController::class, 'viewSliders'])->name('viewSliders');
Route::get('/add-slider', [SlidersController::class, 'addSlider'])->name('addSlider');
Route::post('/adding-slider', [SlidersController::class, 'addingSlider'])->name('addingSlider');
Route::get('/delete-slider/{id}', [SlidersController::class, 'delSlider'])->name('delSlider');
// Admin Panel Sliders Routes ENDS

// Front-end Blog Items Routes STARTS
Route::get('/blogs', [BlogController::class, 'blogs'])->name('blogs');
Route::get('/blog/{id}', [BlogController::class, 'singleBlog'])->name('singleBlog');
// Front-end Blog Items Routes ENDS

// Front-end contact
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
// Front-end contact

// Admin Panel Video Settings STARTS
Route::get('/video-settings', [VideoController::class, 'videoSettings'])->name('videoSettings');
Route::post('/update-video-settings', [VideoController::class, 'updateVideo'])->name('updateVideo');
// Admin Panel Video Settings ENDS


// Admin Panel Scoial Routes STARTS
Route::get('/view-social', [SocialController::class, 'viewSocial'])->name('viewSocial');
Route::get('/add-social', [SocialController::class, 'addSocial'])->name('addSocial');
Route::post('/adding-social', [SocialController::class, 'addingSocial'])->name('addingSocial');
Route::get('/edit-social/{id}', [SocialController::class, 'editSocial'])->name('editSocial');
Route::post('/update-social/{id}', [SocialController::class, 'updateSocial'])->name('updateSocial');
Route::get('/delete-social/{id}', [SocialController::class, 'delSocial'])->name('delSocial');
// Admin Panel Scoial Routes ENDS

// Admin Panel Scoial Routes STARTS
Route::get('/view-social-page', [SocialGroupController::class, 'viewSocialPage'])->name('viewSocialPage');
Route::get('/add-social-page', [SocialGroupController::class, 'addSocialPage'])->name('addSocialPage');
Route::post('/adding-socia-pagel', [SocialGroupController::class, 'addingSocialPage'])->name('addingSocialPage');
Route::get('/edit-social-page/{id}', [SocialGroupController::class, 'editSocialPage'])->name('editSocialPage');
Route::post('/update-social-page/{id}', [SocialGroupController::class, 'updateSocialPage'])->name('updateSocialPage');
Route::get('/delete-social-page/{id}', [SocialGroupController::class, 'delSocialPage'])->name('delSocialPage');
// Admin Panel Scoial Routes ENDS

// Admin Panel Scoial Routes STARTS
Route::get('/address', [ContactController::class, 'viewAddress'])->name('viewAddress');
Route::get('/address-add', [ContactController::class, 'addAddress'])->name('addAddress');
Route::post('/address-adding', [ContactController::class, 'addingAddress'])->name('addingAddress');
Route::get('/address-edit/{id}', [ContactController::class, 'editAddress'])->name('editAddress');
Route::post('/address-update/{id}', [ContactController::class, 'updateAddress'])->name('updateAddress');
Route::get('/address-delete/{id}', [ContactController::class, 'delAddress'])->name('delAddress');
// Admin Panel Scoial Routes ENDS
