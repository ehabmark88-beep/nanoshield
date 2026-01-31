<?php

use App\Http\Controllers\ArticleController;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\User;
use App\Models\Wash_booking;
use App\Services\HyperPayPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WashBookingController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\Artisan;
use App\Models\Article;
use App\Http\Controllers\MaintenanceAppointmentController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/error/{code?}', [PagesController::class, 'error'])
    ->where('code', '404|403|500')
    ->name('error.page');
    
Route::get('/success', function () {
    return view('errors.success');
})->name('success.page');

    

Route::post('/reorder-test', function (Request $request) {

    dd([
        'reorder'    => $request->reorder,
        'booking_id' => $request->booking_id,
        'branch_id'  => $request->branch_id,
        'date'       => $request->date,
        'time'       => $request->time,
        'all_data'   => $request->all(),
    ]);
})->name('reorder.test');

Route::post('/reorder/confirm', [PagesController::class, 'reorderConfirm'])->name('reorder.confirm');


Route::get('/search', [PagesController::class, 'search'])
    ->name('search');


Route::get('/available-times', [ProfileController::class, 'availableTimes']);

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return Redirect::back();
})->name('changeLanguage');

Route::patch(
    '/profile/cancel-booking/{id}',
    [ProfileController::class, 'cancelBooking']
)->name('profile.cancel_booking')->middleware('auth');


// routes/web.php
Route::post('/cancel-maintenance/{id}', [PagesController::class, 'cancelMaintenance'])
    ->name('maintenance.cancel');

Route::post('/cancel-order/{id}', [PagesController::class, 'cancelOrder'])
    ->name('order.cancel');


Route::controller(PagesController::class)->group(function (){
    Route::get('/home','welcome')->name('welcome');
    Route::get('/','welcome')->name('welcome');
    Route::get('/privacy-policy','privacy_policy')->name('privacy_policy');
    Route::get('/contracting','contracting')->name('contracting');
    Route::get('/commercial-concession', 'commercial_concession')->name('commercial_concession');
    Route::get('/contact-us', 'contactus')->name('contactus');
    Route::get('/complaint','complaint')->name('complaint');
    Route::get('/jobs','jobs')->name('jobs');
    Route::get('/commercial-form', 'form_commercial')->name('form_commercial');
    Route::get('/questions','questions')->name('questions');
    Route::get('/about-us', 'about')->name('about');
    Route::get('/news','news')->name('news');
    Route::get('/articles','articles')->name('articles');
    Route::get('/branches','branches')->name('branches');
    Route::get('/warranty','warranty')->name('warranty');
    Route::get('/products','products')->name('products');
    Route::get('/gallery','gallery')->name('gallery');
    Route::get('/videos','videos')->name('videos');
    Route::get('/booking','booking')->name('booking');
    Route::get('/construction_bookingss','construction_bookings')->name('construction_bookings');
    Route::get('/partnerships-contracts', 'Partnerships_and_contracts')->name('Partnerships_and_contracts');
    Route::get('/services-car', 'services_car')->name('services_car');
    Route::get('/carts','carts')->name('carts')->middleware('auth');
    Route::get('/maintenance_appointments','maintenance_appointments')->name('maintenance_appointments');
});


Route::resource('maintenance-appointments', MaintenanceAppointmentController::class)
     ->names('maintenance.appointments');


Route::get('/articles/{article_url}', [ArticleController::class, 'show'])->name('articles.show');

Route::post('users/{id}/add-points', [UserController::class, 'addPoints']);
Route::post('users/{id}/redeem-points', [UserController::class, 'redeemPoints']);

Route::post('/confirm', [PagesController::class, 'confirm'])->name('confirm.store');
Route::post('/wash-bookings', [PagesController::class, 'store'])->name('wash-bookings.store');
Route::post('/order', [PagesController::class, 'order'])->name('order');

Route::post('/countact', [PagesController::class, 'countact'])->name('countact');
Route::post('/recruitments', [PagesController::class, 'recruitments'])->name('recruitments');
Route::post('/complaint_form', [PagesController::class, 'complaint_form'])->name('complaint_form');
Route::post('/franchise_requirements', [PagesController::class, 'franchise_requirements'])->name('franchise_requirements');
Route::post('/partnershipss', [PagesController::class, 'partnershipss'])->name('partnershipss');
Route::post('/construction_booking', [PagesController::class, 'construction_booking'])->name('construction_booking');
Route::post('/appointments', [PagesController::class, 'appointments'])->name('appointments');
Route::post('/formFaq', [PagesController::class, 'formFaq'])->name('formFaq');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// routes/api.php
Route::get('/get-packages', [PackageController::class, 'getPackages'])->name('get.packages');

Route::get('/api/branches/{governorate}', [BranchController::class, 'getBranchesByGovernorate']);


//Route::get('/api/booked-dates/{branchId}/{selectedDate}', [WashBookingController::class, 'getBookedTimesByBranchAndDate']);
//Route::get('/booked-times/{branchId}', [WashBookingController::class, 'getBookedTimesByBranch']);

Route::get('/api/booked-times/{branchId}/{date}', [WashBookingController::class, 'getBookedTimesByBranchAndDate']);

Route::post('/api/check-coupon', function (Request $request) {
    $code = $request->input('code');

    $result = Coupon::checkCoupon($code);

    return response()->json($result);
});



Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create();

    // روابط الصفحات الثابتة
    $staticPages = [
        '/',
        '/home',
        '/privacy-policy',
        '/contracting',
        '/commercial-concession',
        '/contact-us',
        '/complaint',
        '/jobs',
        '/commercial-form',
        '/questions',
        '/about-us',
        '/news',
        '/articles',
        '/branches',
        '/warranty',
        '/products',
        '/gallery',
        '/videos',
        '/booking',
        '/construction_bookingss',
        '/partnerships-contracts',
        '/services-car',
        '/confirm',
    ];

    foreach ($staticPages as $url) {
        $sitemap->add(
            Url::create($url)->setLastModificationDate(now())
        );
    }

    // روابط المقالات (ديناميكية)
    $articles = Article::all();
    foreach ($articles as $article) {
        $sitemap->add(
            Url::create('/articles/' . $article->article_url)
                ->setLastModificationDate($article->updated_at ?? now())
        );
    }

    return response($sitemap->render(), 200)
        ->header('Content-Type', 'application/xml');
});

Route::get('auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('auth/google/callback', function () {
    $user = Socialite::driver('google')->stateless()->user();

    // هنا تستطيع حفظ بيانات المستخدم أو تسجيل دخوله
    dd($user);
});

Route::get('auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    // البحث عن المستخدم في قاعدة البيانات أو إنشائه
    $user = User::firstOrCreate(
        ['email' => $googleUser->getEmail()],
        ['name' => $googleUser->getName(), 'google_id' => $googleUser->getId()]
    );

    // تسجيل دخول المستخدم
    Auth::login($user);

    return redirect('/home'); // إعادة التوجيه بعد تسجيل الدخول
});

Auth::routes(['verify'=> true]);


Route::get('status', function () {
    $check = (new HyperPayPaymentService([], 'production'))->checkPaymentStatus();

    if (isset($check['body']['result']['code']) && $check['body']['result']['code'] == '000.100.110') {
        $data = session('booking_data');

        if (!$data) {
            return redirect('error.page')->with('error', __('messages.booking_data_missing'));
        }

        // نفّذ الحفظ كله في معاملة واحدة، وارجّع $booking لو محتاجه بعدين
        $booking = DB::transaction(function () use ($data) {
            $booking = \App\Models\Wash_booking::create([
                'car_id'              => $data['car_id'],
                'name'                => $data['name'],
                'phone_number'        => $data['phone_number'],
                'email'               => $data['email'],
                'packages'            => $data['packages'],
                'additional_services' => $data['additional_services'],
                'branch_id'           => $data['branch_id'],
                'date'                => $data['date'],
                'time'                => $data['time'],
                'total_price'         => $data['total_price'],
                'duration'            => $data['duration'],
                'payment_method'      => $data['payment_method'],
                'coupon_id'           => $data['coupon_id'],
                'flatbed_id'          => $data['flatbed_id'],
            ]);

            return $booking;
        });

        // ↓↓↓ هنا الكود هيكمّل عادي (مفيش return قبلها)
        session()->put('paid_amount', $data['total_price']);
        session()->forget('booking_data');
        session()->forget('addedProducts');
        session()->forget('cart_count');

        // Redirect نهائي
        if (auth()->check()) {
            return redirect('success.page')->with('success', __('messages.booking_success'));
        }
        return redirect('success.page')->with('success', __('messages.booking_success'));

    } else {
        return redirect('error.page')->with('error', __('messages.payment_failed'));
    }
})->name('status');



//Route::get('status1',function (){
//    $check= (new HyperPayPaymentService([],'production'))->checkPaymentStatus();
//
//    if($check['body']['result']['code'] == '000.100.110'){
//
//        $data = session('order_date');
//
//        if ($data) {
//            // حفظ الحجز في قاعدة البيانات
//            Order::create([
//                'product_ids' => $data['product_ids'],
//                'coupon_id' => $data['coupon_id'],
//                'name' => $data['name'],
//                'email' => $data['email'],
//                'phone_number' => $data['phone_number'],
//                'address' => $data['address'],
//                'final_price' => $data['final_price'],
//                'payment_method' => $data['payment_method'],
//            ]);
//
//            session()->forget('order_date');
//        }
////        return  $check['body']['result']['description'];
//        return redirect()->route('products')->with(['sussess' => $check['body']['result']['description'] ]);
//    }
//    else {
//        // إذا فشل الدفع
//        return redirect('/')->with('error', __('messages.payment_failed'));
//    }
//})->name('status1');

//Route::post('/pay', function () {

//    MASTER or VISA or MADA
//        $card_type = 'MADA';
//
//        $data=[
//            'amount'=>1,
//            'customer.email'=>'ali@gmai.com',
//            'billing.street1'=>"asdfdas",
//            'billing.city'=>'sdf',
//            'billing.state'=>'ryad',
//            'billing.postcode'=>'123',
//            'customer.givenName'=>'ali',
//            'customer.surname'=>'ali',
//            'merchantTransactionId'=>rand(1000,10000),
//            'shopperResultUrl'=>route('status1')
//        ];
//        return (new HyperPayPaymentService($data,'production',$card_type))->checkout();

//})->name('pay');

Route::post('/clear-cache', function() {
    Artisan::call('cache:clear');  // مسح الكاش
    Artisan::call('view:clear');   // مسح ملفات العرض
    Artisan::call('config:clear'); // مسح إعدادات الكاش
    Artisan::call('route:clear');  // مسح الكاش الخاص بالمسارات

    return response()->json(['status' => 'Cache cleared successfully']);
});


Route::middleware('auth')->post('/api/loyalty/apply-consume', function (Request $request) {
    $data = $request->validate([
        'points'      => 'required|integer|min:0',
        'base_total'  => 'required|numeric|min:0',
        'packages'    => 'nullable' // قد تكون id واحد أو JSON array كسلسلة
    ]);

    $email = auth()->user()->email;

    // helper: حوّل أي قيمة إلى Array IDs
    $toIdArray = function ($value) {
        if (is_null($value) || $value === '') return [];
        if (is_array($value)) {
            return array_values(array_filter(array_map('intval', $value)));
        }
        // لو مرسلة كسلسلة JSON
        $decoded = json_decode($value, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return array_values(array_filter(array_map('intval', (array) $decoded)));
        }
        // لو رقم كسلسلة
        if (is_numeric($value)) return [ (int) $value ];
        return [];
    };

    $packageIds = $toIdArray($data['packages'] ?? null);

    // ====== منع خصم الولاء على عروض category_id = 2 وأي مزج معها ======
    if (!empty($packageIds)) {
        // هات الفئات للباكدجات المختارة
        $categories = DB::table('packages')
            ->whereIn('id', $packageIds)
            ->pluck('category_id')
            ->filter()                 // شيل null
            ->map(fn($v) => (int)$v)   // ثبّت كأرقام
            ->values()
            ->all();

        $hasOfferCategory = in_array(2, $categories, true);           // هل في فئة عروض؟
        $isMixedSelection = $hasOfferCategory && count(array_unique($categories)) > 1; // عروض + فئات أخرى

        if ($hasOfferCategory || $isMixedSelection) {
            return response()->json([
                'ok'      => false,
                'message' => 'لا يمكن تفعيل نقاط الولاء مع باكدجات العروض أو المزج بينها وبين فئات أخرى.'
            ], 422);
        }
    }


    // إجمالي النقاط المتاحة (Active + غير منتهية)
    $available = DB::table('loyalty_points_ledger')
        ->where('email', $email)
        ->where('status', 'active')
        ->where(function ($q) {
            $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
        })
        ->sum('points');

    if ($available <= 0) {
        return response()->json(['ok' => false, 'message' => 'لا توجد نقاط متاحة'], 422);
    }

    $requestedPoints = (int) $data['points'];
    if ($requestedPoints <= 0) {
        return response()->json(['ok' => false, 'message' => 'من فضلك أدخل عدد نقاط صحيح'], 422);
    }

    // نقاط قابلة للاستخدام فعليًا (لا تتجاوز المتاح) ومقربة لأقرب 1000 لأسفل
    $usablePoints = min($requestedPoints, $available);
    $usedPoints   = floor($usablePoints / 1000) * 1000;
    if ($usedPoints <= 0) {
        return response()->json(['ok' => false, 'message' => 'الحد الأدنى للاستخدام 1000 نقطة'], 422);
    }

    // حساب الخصم: كل 1000 نقطة = 100 ريال
    $discount = ($usedPoints / 1000) * 100;

    // لا نتجاوز المبلغ الأساسي قبل خصم النقاط
    $baseTotal = (float) $data['base_total'];
    if ($baseTotal <= 0) {
        return response()->json(['ok' => false, 'message' => 'لا يمكن تطبيق خصم على إجمالي صفر'], 422);
    }
    if ($discount > $baseTotal) {
        $discount   = floor($baseTotal / 100) * 100; // مضاعفات 100
        $usedPoints = $discount * 10;                // لأن 100 ريال = 1000 نقطة
        if ($usedPoints <= 0) {
            return response()->json(['ok' => false, 'message' => 'قيمة الخصم غير صالحة'], 422);
        }
    }

    // استهلاك النقاط (FIFO)
    DB::transaction(function () use ($email, $usedPoints) {
        $remaining = $usedPoints;

        $rows = DB::table('loyalty_points_ledger')
            ->where('email', $email)
            ->where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
            })
            ->orderByRaw('CASE WHEN expires_at IS NULL THEN 1 ELSE 0 END, expires_at ASC')
            ->orderBy('created_at', 'ASC')
            ->lockForUpdate()
            ->get(['id', 'points']);

        foreach ($rows as $row) {
            if ($remaining <= 0) break;

            if ($row->points > $remaining) {
                DB::table('loyalty_points_ledger')
                    ->where('id', $row->id)
                    ->update([
                        'points' => $row->points - $remaining,
                    ]);
                $remaining = 0;
            } else {
                DB::table('loyalty_points_ledger')
                    ->where('id', $row->id)
                    ->update([
                        'points'      => 0,
                        'status'      => 'consumed',
                        'consumed_at' => now(),
                    ]);
                $remaining -= $row->points;
            }
        }

        if ($remaining > 0) {
            throw new \RuntimeException('رصيد النقاط تغيّر أثناء التنفيذ، حاول مرة أخرى.');
        }
    });

    $final = max(0, $baseTotal - $discount);

    // النقاط المتبقية بعد الاستهلاك
    $remainingAvailable = DB::table('loyalty_points_ledger')
        ->where('email', $email)
        ->where('status', 'active')
        ->where(function ($q) {
            $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
        })
        ->sum('points');

    return response()->json([
        'ok'                  => true,
        'email'               => $email,
        'used_points'         => (int) $usedPoints,
        'loyalty_discount'    => (float) $discount,
        'final_after_loyalty' => (float) $final,
        'available_points'    => (int) $remainingAvailable,
        'message'             => 'تم تطبيق خصم نقاط الولاء بنجاح'
    ]);
});


