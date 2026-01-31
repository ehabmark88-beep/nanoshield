<?php

use App\Http\Controllers\WebsiteSettingController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\admin\SalesDashboardController;
use App\Http\Controllers\admin\BranchAdminDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BeforeAfterController;
use App\Http\Controllers\FormFaqController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\SeoSettingController;
use App\Http\Controllers\WashBookingController;
use App\Http\Controllers\VideoGalleryController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ConstructionServiceController;
use App\Http\Controllers\ConstructionBookingController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdditionalServiceController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ComConController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\auth\AdminLoginController;
use App\Http\Controllers\admin\auth\AdminRegisterController;
use App\Http\Controllers\Admin\UploadController;


/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/admin/articles/toggle-active', [ArticleController::class, 'toggleActive'])->name('admin.dashboard.articles.toggleActive');
Route::post('/admin/packages/toggle-active', [PackageController::class, 'toggleActive'])->name('admin.dashboard.packages.toggleActive');
Route::post('/admin/upload/image', [UploadController::class, 'upload'])->name('admin.upload.image');
Route::get('admin/sales-dashboard', [SalesDashboardController::class, 'index'])->name('admin.sales.dashboard');
Route::get('dashbook', [AdminHomeController::class, 'dashbook'])->name('dashbook');

Route::get(
    '/admin/{branch_id}/maintenance/{id}/edit',
    [BranchAdminDashboardController::class, 'editMaintenance']
)->name('admin.maintenance.edit');


Route::patch(
    '/admin/{branch_id}/maintenance/{id}/status',
    [BranchAdminDashboardController::class, 'updateMaintenanceStatus']
)->name('admin.maintenance.updateStatus');


Route::delete(
    'admin/dashboard/branch/open-time/{id}',
    [BranchAdminDashboardController::class, 'open_time']
)->name('admin.dashboard.open_time');

Route::get('admin/dashboard/website-settings', 
    [WebsiteSettingController::class, 'index']
)->name('admin.website.settings');
Route::get('admin/dashboard/website-settings/edit', 
    [WebsiteSettingController::class, 'edit']
)->name('admin.dashboard.website-settings.edit');
Route::put('admin/dashboard/website-settings/update', 
    [WebsiteSettingController::class, 'update']
)->name('admin.dashboard.website-settings.update');


Route::prefix('admin/dashboard/')->name('admin.dashboard.')->group(function (){
        Route::middleware('auth:admin')->group(function (){
            Route::resource('users', UserController::class);
            Route::get('home', [AdminHomeController::class, 'index'])->name('home');
            Route::resource('form-faq', FormFaqController::class);
            Route::resource('seo-settings', SeoSettingController::class);
            Route::resource('admins', AdminController::class);
            Route::resource('reviews', ReviewController::class);
            Route::resource('cars', CarController::class);
            Route::resource('commercial_concession', ComConController::class);
            Route::resource('contact_us', ContactUsController::class);
            Route::resource('questions', QuestionController::class);
            Route::resource('recruitments', RecruitmentController::class);
            Route::resource('sliders', SliderController::class);
            Route::resource('offers', OffersController::class);
            Route::resource('partners', PartnerController::class);
            Route::resource('wash_booking', WashBookingController::class);
            Route::resource('video_gallery', VideoGalleryController::class);
            Route::resource('product_category', ProductCategoryController::class);
            Route::resource('products', ProductController::class);
            Route::resource('packages', PackageController::class);
            Route::resource('package_category', PackageCategoryController::class);
            Route::resource('media', NewsController::class);
            Route::resource('galleries', GalleryController::class);
            Route::resource('coupons', CouponController::class);
            Route::resource('construction_service', ConstructionServiceController::class);
            Route::resource('construction_booking', ConstructionBookingController::class);
            Route::resource('complaint', ComplaintController::class);
            Route::resource('carts', CartController::class);
            Route::resource('branches', BranchController::class);
            Route::resource('addition_service', AdditionalServiceController::class);
            Route::resource('partnerships', PartnershipController::class);
            Route::resource('governorates', GovernorateController::class);
            Route::resource('before_after', BeforeAfterController::class);
            Route::resource('articles', ArticleController::class);
            Route::resource('orders', OrderController::class);

    });

    Route::controller(AdminLoginController::class)->group(function (){
        Route::get('login',  'login')->name('login')->middleware('guest:admin');
        Route::post('login','checkLogin')->name('check');
        Route::post('logout','logout')->name('logout');
    });

    Route::controller(AdminRegisterController::class)->group(function (){
        Route::get('register','register')->name('register');
        Route::post('register', 'store')->name('store');
    });
});


    Route::get('admin/dashboard/branch/{branch_id}', [BranchAdminDashboardController::class, 'index'])->name('admin.dashboard.branch');
    Route::get('admin/dashboard/{old_view_id}', [BranchAdminDashboardController::class, 'old_view'])->name('admin.dashboard.old_view');
    Route::get('admin/dashboard/branch/{branch_id}/maintenance', [BranchAdminDashboardController::class, 'maintenanceAppointments'])->name('admin.dashboard.branch.maintenance');
    
    Route::get('admin/dashboard/close/{branch_id}', [BranchAdminDashboardController::class, 'close'])->name('admin.dashboard.close');
    Route::post('admin/dashboard/close_time', [BranchAdminDashboardController::class, 'close_time'])->name('admin.dashboard.close_time');

    Route::get('admin/dashboard/edit/{id}/{branch_id}', [BranchAdminDashboardController::class, 'edit_booking'])->name('admin.dashboard.edit_booking');
    Route::patch('admin/dashboard/update-booking/{id}', [BranchAdminDashboardController::class, 'update_booking'])->name('admin.dashboard.update_booking');
    Route::post('admin/dashboard/checkLogin', [AdminLoginController::class, 'checkLogin'])->name('admin.dashboard.check')->middleware('guest:admin');

Route::get('admin/dashboard/login', [AdminLoginController::class, 'login'])->name('admin.dashboard.login')->middleware('guest:admin');
