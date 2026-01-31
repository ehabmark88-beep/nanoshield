<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use App\Models\Additional_service;
use App\Models\Article;
use App\Models\Before_after;
use App\Models\Branch;
use App\Models\Car;
use App\Models\Cart;
use App\Models\Construction_service;
use App\Models\Coupon;
use App\Models\Flatbed;
use App\Models\Gallery;
use App\Models\Governorate;
use App\Models\News;
use App\Models\Offers;
use App\Models\Order;
use App\Models\Package;
use App\Models\Package_category;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Question;
use App\Models\Review;
use App\Models\SeoSetting;
use App\Models\Slider;
use App\Models\User;
use App\Models\Video_gallery;
use App\Models\Wash_booking;
use App\Services\HyperPayPaymentService;
use Illuminate\Http\Request;
use Termwind\Components\Dd;
use App\Models\Contact_us;
use App\Models\Recruitment;
use App\Models\Complaint;
use App\Models\Com_con;
use App\Models\Partnership;
use App\Models\Construction_booking;
use App\Models\MaintenanceAppointment;
use App\Models\form_faq;
use App\Traits\ImageTrait;
use App\Models\WebsiteSetting;

class PagesController extends Controller
{
    use ImageTrait;
    
public function reorderConfirm(Request $request)
{
    // =========================
    // 1️⃣ جلب الحجز القديم
    // =========================
    $oldBooking = Wash_booking::findOrFail($request->booking_id);

    // =========================
    // 2️⃣ استخراج الباكيدچات IDs من الحجز القديم
    // =========================
    $raw = $oldBooking->packages;
    $decoded = is_string($raw) ? json_decode($raw, true) : $raw;

    $packageIds = collect((array) $decoded)
        ->map(fn ($id) => (int) $id)
        ->filter()
        ->values();

    // =========================
    // 3️⃣ جلب الباكيدچات + السعر + الساعات
    // =========================
    $packages = Package::whereIn('id', $packageIds)
        ->get(['id', 'name', 'name_en', 'price', 'hours']);

    // =========================
    // 4️⃣ حساب السعر والمدة
    // =========================
    $totalPrice    = $packages->sum('price');
    $totalDuration = $packages->sum('hours');

    // =========================
    // 5️⃣ تجهيز data زي confirm
    // =========================
    $data = [
        'reorder'              => true,
        'booking_id'           => $oldBooking->id,
        'branch_id'            => $request->branch_id,
        'date'                 => $request->date,
        'time'                 => $request->time,
        'packages'             => $oldBooking->packages,
        'car_id'               => $oldBooking->car_id,
        'additional_services'  => $oldBooking->additional_services,
        'total_price'          => $totalPrice,
        'duration'             => $totalDuration,
        'payment_method'      => null,
        'coupon_id'      => null,
        'offer'      => null,
                'flatbed_id'      => null,



    ];

    // =========================
    // 6️⃣ نفس منطق confirm
    // =========================
    $flatbeds = Flatbed::all();

    $car = Car::select('id', 'size', 'size_ar')
        ->findOrFail((int) $data['car_id']);

    $branch = Branch::with(['governorate:id,name,name_ar'])
        ->select('id', 'branch_name', 'branch_name_ar', 'governorate_id')
        ->find($request->branch_id);

    $governorate = $branch?->governorate;

    $offers = Offers::all();

    // =========================
    // 7️⃣ نقاط الولاء
    // =========================
    $userEmail       = null;
    $availablePoints = 0;

    if (auth()->check()) {
        $userEmail = auth()->user()->email;

        $availablePoints = \DB::table('loyalty_points_ledger')
            ->where('email', $userEmail)
            ->where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
            })
            ->sum('points');
    }

    // =========================
    // 8️⃣ فتح صفحة confirm
    // =========================
    return view('confirm', compact(
        'data',
        'flatbeds',
        'car',
        'branch',
        'packages',
        'governorate',
        'offers',
        'userEmail',
        'availablePoints'
    ));
}


    public function welcome()
    {
        $seoSettings = SeoSetting::where('page_name', 'الرئيسة')->get();
        $before_afters = Before_after::all();
        $products = Product::all();
        $offers = Offers::all();
        $sliders = Slider::all();
        $partners = Partner::all();
        $reviews = Review::all();
        return view('welcome', compact('partners','reviews', 'sliders', 'offers','products','before_afters', 'seoSettings'));
    }

    public function privacy_policy()
    {
        $offers = Offers::all();
        $seoSettings = SeoSetting::where('page_name', 'السياسة و الخصوصية')->get();
        return view('privacy_policy',compact('seoSettings','offers'));
    }
    public function contracting()
    {
        $offers = Offers::all();
        $seoSettings = SeoSetting::where('page_name', 'خدمات المقاولات')->get();
        return view('contracting',compact('seoSettings','offers'));
    }

    public function commercial_concession()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'الأمتياز التجاري')->get();
        return view('commercial_concession',compact('seoSettings','offers'));
    }

    public function contactus()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'الرسائل')->get();
        return view('contactus',compact('seoSettings','offers'));
    }
    public function complaint()
    {
        $seoSettings = SeoSetting::where('page_name', 'الشكاوي')->get();
        $offers = Offers::all();

        $branches = Branch::where('governorate_id', '!=', 5)->get();
        return view('complaint', compact('branches', 'seoSettings','offers'));
    }
    public function form_commercial()
    {
        $seoSettings = SeoSetting::where('page_name', 'حجز المتياز التجاري')->get();
        $offers = Offers::all();

        return view('form_commercial',compact('seoSettings','offers'));
    }
    public function jobs()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'التوظيف')->get();
        return view('recruitment',compact('seoSettings','offers'));
    }

    public function questions()
    {
                $offers = Offers::all();
        $seoSettings = SeoSetting::where('page_name', 'الأسئلة الشائعة')->get();
        $faqs = Question::where('active', true)->get();
        return view('questions',compact('faqs', 'seoSettings','offers'));
    }

    public function about()
    {
        $offers = Offers::all();
        $seoSettings = SeoSetting::where('page_name', 'من نحن')->get();
        return view('about',compact('seoSettings','offers'));
    }

    public function news()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'الأخبار')->get();
        $news = News::all() ;
        return view('news', compact('news', 'seoSettings','offers'));
    }

    public function articles()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'المقالات')->get();
        $news = Article::where('active', 1)->get();
        return view('articles', compact('news', 'seoSettings','offers'));
    }


    public function branches()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'الفروع')->get();
        $branches =  Branch::all() ;
        return view('branches', compact('branches', 'seoSettings','offers'));
    }

    public function warranty()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'الضمان')->get();
        return view('warranty',compact('seoSettings','offers'));
    }

    public function products()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'المنتاجات')->get();
        $products = Product::all();
        return view('products', compact('products', 'seoSettings','offers'));
    }

    public function gallery()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'المعرض')->get();
        $galleries = Gallery::all();
        return view('gallery', compact('galleries', 'seoSettings','offers'));
    }
    public function videos()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'الفديو')->get();
        $videos = Video_gallery::with('package', 'category')->get();
        return view('videos',compact('seoSettings', 'videos','offers'));
    }
    public function construction_bookings()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'حجز المقاولات')->get();
        $services = Construction_service::all();
        return view('construction_bookingss', compact('services', 'seoSettings','offers'));
    }
    public function booking()
    {
        $offers = Offers::all();

        $user = auth()->user();
        $userData = null;
        if ($user) {
            $userData = [
                'name' => $user->name,
                'phone_number' => $user->phone_number, // تأكد أن لديك هذا الحقل في قاعدة البيانات
                'email' => $user->email,
            ];
        }
        $flatbeds = Flatbed::all();
        $seoSettings = SeoSetting::where('page_name', 'الحجز')->get();
        $packages = Package::with('car')->get();
        $categories = Package_category::all();
        $cars = Car::all();
        $governorates = Governorate::where('name', '!=', 'Egypt')->get();
        $services = Additional_service::all();
        return view('booking', compact('services', 'governorates', 'cars', 'categories', 'packages', 'seoSettings','flatbeds', 'userData','offers'));
    }
    public function Partnerships_and_contracts()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'الشركاء')->get();
        return view('Partnerships_and_contracts',compact('seoSettings','offers'));
    }

    public function services_car()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'خدمات السيارات')->get();
        $categories = Package_category::all();
        return view('services_car', compact('categories', 'seoSettings','offers'));
    }

    public function carts()
    {
        $offers = Offers::all();

        $seoSettings = SeoSetting::where('page_name', 'عربة التسوق')->get();
        return view('carts',compact('seoSettings','offers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_id' => 'required',
            'name' => 'required',
            'phone_number' =>'required',
            'packages' => 'required',
            'branch_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'payment_method' => 'required',
        ], [
            'car_id' => __('messages.car_id'),
            'name' => __('messages.name'),
            'phone_number' => __('messages.phone_number'),
            'packages' => __('messages.packages'),
            'branch_id' => __('messages.branch_id'),
            'date' => __('messages.date'),
            'time' => __('messages.time'),
            'payment_method' => __('messages.payment_method'),
        ]);

        $car_id = $request->car_id;
        $name = $request->name;
        $phone_number = $request->phone_number;
        $packages = $request->packages;
        $branch_id = $request->branch_id;
        $date = $request->date;
        $time = $request->time;
        $duration = $request->duration;
        $payment_method = $request->payment_method;
        $email = $request->email;
        $additional_services = $request->additional_services;
        $coupon_id = $request->coupon_id;
        $flatbed_id = $request->flatbed_id;
        $offer = $request->offer;
        $total_price = $request->total_price;
        $final_price = $offer ?: $total_price;


        if ($coupon_id) {
            $coupon = Coupon::find($coupon_id);
            if ($coupon) {
                $coupon->used += 1;
                $coupon->save();
            } else {
                return response()->json([
                    'message' => 'Coupon not found.'
                ], 404);
            }
        }

        if ($payment_method !== 'payBranch') {
            //    MASTER or VISA or MADA
            $card_type = $payment_method;

            $data = [
                'amount' => $final_price,
                'customer.email' => 'ali@gmai.com',
                'billing.street1' => "asdfdas",
                'billing.city' => 'sdf',
                'billing.state' => 'ryad',
                'billing.postcode' => '123',
                'customer.givenName' => 'ali',
                'customer.surname' => 'ali',
                'merchantTransactionId' => rand(1000, 10000),
                'shopperResultUrl' => route('status')
            ];
            session([
                'booking_data' => [
                    'car_id' => $car_id,
                    'name' => $name,
                    'phone_number' => $phone_number,
                    'email' => $email,
                    'packages' => $packages,
                    'additional_services' => $additional_services,
                    'branch_id' => $branch_id,
                    'date' => $date,
                    'time' => $time,
                    'total_price' => $final_price,
                    'duration' => $duration,
                    'payment_method' => $payment_method,
                    'coupon_id' => $coupon_id,
                    'flatbed_id' => $flatbed_id,
                ],
            ]);

            return (new HyperPayPaymentService($data, 'production', $card_type))->checkout();

        } else {
            // حساب النقاط مرة واحدة

            // ننفذ كل الكتابة في معاملة واحدة، ونرجّع الـ Booking بعد الحفظ
            $booking = DB::transaction(function () use (
                $car_id, $name, $phone_number, $email, $packages, $additional_services,
                $branch_id, $date, $time, $final_price, $duration, $payment_method,
                $coupon_id, $flatbed_id
            ) {
                // 1) إنشاء الحجز
                $booking = Wash_booking::create([
                    'car_id'             => $car_id,
                    'name'               => $name,
                    'phone_number'       => $phone_number,
                    'email'              => $email,
                    'packages'           => $packages,
                    'additional_services'=> $additional_services,
                    'branch_id'          => $branch_id,
                    'date'               => $date,
                    'time'               => $time,
                    'total_price'        => $final_price,
                    'duration'           => $duration,
                    'payment_method'     => $payment_method,
                    'coupon_id'          => $coupon_id,
                    'flatbed_id'         => $flatbed_id,
                ]);

               

                return $booking;
            });

            // 3) الـ redirect خارج المعاملة
            if (auth()->check()) {
                return redirect()
                    ->route('profile.show')
                    ->with('success', 'تم الحجز بنجاحك.');
            }

            return redirect()
                ->route('success.page')
                ->with('success', 'تم الحجز بنجاح!');
        }
    }

    public function order(Request $request){

        // استلام جميع قيم cart_id كمصفوفة
        $cartIds = $request->input('cart_id'); // ستكون مصفوفة من IDs

        // نبدأ في جمع بيانات المنتجات من سلة التسوق
        $orderData = [];
        // حلقة على كل cart_id لاسترجاع بيانات المنتج
        foreach ($cartIds as $cartId) {
            $cart = Cart::find($cartId);

            // التأكد من أن الكارت موجود
            if ($cart) {
                // استرجاع بيانات المنتج المرتبط بالكارت
                $product = $cart->product; // نفترض أن هناك علاقة بين Cart و Product (مثل hasOne)

                // جمع البيانات المطلوبة
                $productData = [
                    'product_id' => $product->id,
                    'quantity' => $cart->quantity,
                ];

                $orderData[] = $productData;
            }
        }

        // تحويل البيانات إلى JSON
        $orderDataJson = json_encode($orderData);

        // استلام البيانات الأخرى من النموذج
        $couponId = $request->input('coupon_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $phoneNumber = $request->input('phone_number');
        $address = $request->input('address');
        $finalPrice = $request->input('final_price');
        $pay = $request->input('payment_method');

        foreach ($cartIds as $cartId) {
            $cart = Cart::find($cartId);
            if ($cart) {
                $cart->delete(); // مسح السجل
            }
        }

        if ($pay !== 'payBranch') {
            $card_type = $pay;
            $data = [
                'amount' => $finalPrice,
                'customer.email' => 'ali@gmai.com',
                'billing.street1' => "asdfdas",
                'billing.city' => 'sdf',
                'billing.state' => 'ryad',
                'billing.postcode' => '123',
                'customer.givenName' => 'ali',
                'customer.surname' => 'ali',
                'merchantTransactionId' => rand(1000, 10000),
                'shopperResultUrl' => route('status1')
            ];
            session([
                'order_date' => [
                    'product_ids' => $orderDataJson,  // تخزين بيانات المنتج والكميات بتنسيق JSON
                    'coupon_id' => $couponId,
                    'name' => $name,
                    'email' => $email,
                    'phone_number' => $phoneNumber,
                    'address' => $address,
                    'final_price' => $finalPrice,
                    'payment_method' => $pay,
                ],
            ]);

            return (new HyperPayPaymentService($data, 'production', $card_type))->checkout();

        } else {
            Order::create([
                'product_ids' => $orderDataJson,  // تخزين بيانات المنتج والكميات بتنسيق JSON
                'coupon_id' => $couponId,
                'name' => $name,
                'email' => $email,
                'phone_number' => $phoneNumber,
                'address' => $address,
                'final_price' => $finalPrice,
                'payment_method' => $pay,
            ]);
            session()->forget('addedProducts');
            session()->forget('cart_count');
                        session()->put('paid_amount', $finalPrice);

            return redirect()->back()->with('success', 'تم عمل الطلب بنجاح!');
        }

    }
    public function confirm(Request $request)
{
    $flatbeds = Flatbed::all();
    $data = $request->all();

    // ✅ تصحيح car_id
    $car = Car::select('id','size','size_ar')->findOrFail((int) $request->car_id);

    $branch = $request->filled('branch_id')
        ? Branch::with(['governorate:id,name,name_ar'])
            ->select('id','branch_name','branch_name_ar','governorate_id')
            ->find($request->branch_id)
        : null;

    $governorate = $branch?->governorate
        ?? ($request->filled('governorate_id')
            ? Governorate::select('id','name','name_ar')->find($request->governorate_id)
            : null);

    $raw = $request->input('packages'); // ممكن تكون '["22","23"]' أو ['22','23']
    $decoded = is_string($raw) ? json_decode($raw, true) : $raw;

    $packageIds = collect($decoded)
        ->map(fn ($id) => (int) $id)
        ->filter()
        ->values();

    $packages = Package::whereIn('id', $packageIds)->get(['id','name','name_en']);
    $offers   = Offers::all();

    // === نقاط الولاء (لو المستخدم مسجّل دخول) ===
    $userEmail       = null;
    $availablePoints = 0;

    if (auth()->check()) {
        $userEmail = auth()->user()->email;

        // إجمالي النقاط المتاحة: active + غير منتهية
        $availablePoints = \DB::table('loyalty_points_ledger')
            ->where('email', $userEmail)
            ->where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
            })
            ->sum('points');
    }

    // نبعت الإيميل والنقاط للـ view
    return view('confirm', compact(
        'data', 'flatbeds', 'car', 'branch', 'packages', 'governorate', 'offers',
        'userEmail', 'availablePoints'
    ));
}

    public function maintenance_appointments(){
        $seoSettings = SeoSetting::where('page_name', 'حجز موعد صيانة')->get();
        $offers = Offers::all();
$branches = Branch::where(function ($query) {
    $query->where('governorate_id', '!=', 5)
          ->orWhereNull('governorate_id');
})->get();


        return view('maintenance_appointments', compact('seoSettings','offers','branches'));
    }
    
    

public function countact(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15', // Adjust max length as per your needs
            'email' => 'max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string', // Ensure the message is at least 10 characters
        ], [
            // Custom error messages
            'name.required' => 'الاسم مطلوب.',
            'phone_number.required' => 'رقم الهاتف مطلوب.',
            'subject.required' => 'عنوان الموضوع مطلوب.',
            'message.required' => 'الرسالة مطلوبة.',
            'message.min' => 'يجب أن تحتوي الرسالة على 10 أحرف على الأقل.',
        ]);

        Contact_us::create($validatedData);

        return redirect()->route('contactus')->with('success', 'تم الارسال !');
    }



    public function recruitments(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'nullable|max:255',
            'phone' => 'required|string|max:15',
            'gender' => 'required|in:male,female',
            'job_position' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'training_courses' => 'nullable|string|max:1000',
            'cv.*' => 'required|mimes:pdf,doc,docx|max:2048', // Each file must be of valid type and size
        ], [
            'name.required' => 'الاسم مطلوب.',
            'date_of_birth.required' => 'تاريخ الميلاد مطلوب.',
            'phone.required' => 'رقم الهاتف مطلوب.',
            'gender.required' => 'الجنس مطلوب.',
            'job_position.required' => 'المسمى الوظيفي مطلوب.',
            'city.required' => 'المدينة مطلوبة.',
            'cv.*.mimes' => 'يجب أن تكون السيرة الذاتية بصيغة PDF أو DOC أو DOCX.',
            'cv.*.max' => 'حجم الملف يجب ألا يتجاوز 2 ميغابايت.',
        ]);

        // Save multiple CV files
        $uploadedCvs = [];
        if ($request->hasFile('cv')) {
            foreach ($request->file('cv') as $file) {
                $uploadedCvs[] = $this->saveImage($file, 'recruitment/cv');
            }
        }

        // Save recruitment data
        Recruitment::create([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'job_position' => $request->job_position,
            'city' => $request->city,
            'training_courses' => $request->training_courses,
            'cv' => json_encode($uploadedCvs), // Store CVs as JSON array
        ]);

        return redirect('jobs')->with('success', 'تم الإرسال بنجاح!');
    }

      public function complaint_form(Request $request)
    {
              $validatedData = $request->validate([
            'complaint_type' => 'required|string|max:255',
            'branch_id' => 'required|exists:branches,id',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'invoice_number' => 'required|string|max:255',
            'message' => 'required|string',
            'image.*' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048', // السماح برفع عدة صور بصيغ معينة
        ], [
            'complaint_type.required' => 'يرجى تحديد نوع الشكوى.',
            'complaint_type.string' => 'نوع الشكوى يجب أن يكون نصًا.',
            'complaint_type.max' => 'نوع الشكوى يجب ألا يتجاوز 255 حرفًا.',

            'branch_id.required' => 'يرجى اختيار الفرع.',
            'branch_id.exists' => 'الفرع المحدد غير موجود.',

            'name.required' => 'يرجى إدخال اسمك.',
            'name.string' => 'الاسم يجب أن يكون نصًا.',
            'name.max' => 'الاسم يجب ألا يتجاوز 255 حرفًا.',

            'phone_number.required' => 'يرجى إدخال رقم الجوال.',
            'phone_number.string' => 'رقم الجوال يجب أن يكون نصًا.',
            'phone_number.max' => 'رقم الجوال يجب ألا يتجاوز 15 حرفًا.',

            'email.email' => 'يرجى إدخال بريد إلكتروني صالح.',
            'email.max' => 'البريد الإلكتروني يجب ألا يتجاوز 255 حرفًا.',

            'invoice_number.required' => 'يرجى إدخال رقم الفاتورة.',
            'invoice_number.string' => 'رقم الفاتورة يجب أن يكون نصًا.',
            'invoice_number.max' => 'رقم الفاتورة يجب ألا يتجاوز 255 حرفًا.',

            'message.required' => 'يرجى كتابة الرسالة.',
            'message.string' => 'الرسالة يجب أن تكون نصًا.',

            'image.*.mimes' => 'الصور يجب أن تكون بصيغة jpeg أو jpg أو png أو gif.',
            'image.*.max' => 'حجم الصورة يجب أن لا يتجاوز 2 ميغابايت.',
        ]);



        // حفظ الصور
        $imagePaths = [];
        if ($request->hasFile('image')) {
            // التحقق من كل صورة يتم رفعها
            foreach ($request->file('image') as $image) {
                // استخدام دالة لحفظ الصورة وإرجاع مسارها
                $imagePaths[] = $this->saveImage($image, 'complaints/images');
            }
        }

        // تخزين الشكوى في قاعدة البيانات مع المسارات المحفوظة للصور
        Complaint::create([
            'complaint_type' => $request->complaint_type,
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'invoice_number' => $request->invoice_number,
            'image' => json_encode($imagePaths),  // تخزين المسارات كـ JSON array
            'message' => $request->message,
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return redirect('complaint')->with('success', 'تم إرسال الشكوى بنجاح!');
    }

     public function partnerships(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'organization_name' => 'required|string|max:255',
            'organization_type' => 'required|in:جهة حكومية,جهة خاصة,وكالة سيارات,معارض سيارات',
            'contact_person' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:partnerships,email',
            'request_details' => 'required|string',
            'commercial_registry_files.*' => 'required|file|max:2048', // التحقق من حجم الملف فقط
        ], [
            'organization_name.required' => 'اسم الجهة مطلوب.',
            'organization_type.required' => 'نوع الجهة مطلوب.',
            'contact_person.required' => 'اسم الشخص المسؤول مطلوب.',
            'phone_number.required' => 'رقم الجوال مطلوب.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'request_details.required' => 'تفاصيل الطلب مطلوبة.',
            'commercial_registry_files.*.max' => 'حجم الملف يجب ألا يتجاوز 2 ميغابايت.',
        ]);

        // حفظ ملفات السجل التجاري
        $uploadedFiles = [];
        if ($request->hasFile('commercial_registry_files')) {
            foreach ($request->file('commercial_registry_files') as $file) {
                $uploadedFiles[] = $this->saveFile($file, 'partnerships/commercial_registries');
            }
        }

        // حفظ بيانات الشراكة
        Partnership::create([
            'organization_name' => $request->organization_name,
            'organization_type' => $request->organization_type,
            'contact_person' => $request->contact_person,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'request_details' => $request->request_details,
            'commercial_registry_files' => json_encode($uploadedFiles), // تخزين الملفات كـ JSON array
        ]);

        return redirect()->route('Partnerships_and_contracts')->with('success', 'تم إرسال الشراكة بنجاح!');
    }

      public function construction_booking(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'city' => 'required|string|max:255',
            'service_id' => 'required|exists:construction_services,id',
            'approximate_area' => 'required|numeric',
        ], [
            'type.required' => 'نوع الحجز مطلوب.',
            'name.required' => 'اسم العميل مطلوب.',
            'phone_number.required' => 'رقم الجوال مطلوب.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'city.required' => 'المدينة مطلوبة.',
            'service_id.required' => 'الخدمة مطلوبة.',
        ]);

        // حفظ الصور المرفوعة إن وجدت
        $site_images = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $site_images[] = $this->saveImage($image, 'construction_bookings/img');
            }
        }

        // حفظ ملفات السجل التجاري إن وجدت
        $commercial_registry_files = [];
        if ($request->hasFile('commercial_registry_files')) {
            foreach ($request->file('commercial_registry_files') as $file) {
                $commercial_registry_files[] = $this->saveImage_1($file, 'commercial_registries/img');
            }
        }

        // حفظ بيانات الحجز
        Construction_booking::create([
            'type' => $request->type,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'city' => $request->city,
            'service_id' => $request->service_id,
            'approximate_area' => $request->approximate_area,
            'image' => json_encode($site_images), // تخزين الصور كـ JSON array
            'commercial_registry_files' => json_encode($commercial_registry_files), // تخزين ملفات السجل التجاري
            'status' => '0',
        ]);

        return redirect()->route('construction_bookings')->with('success', 'تم إنشاء الحجز بنجاح!');
    }

 public function appointments(Request $request)
{
    // التحقق من البيانات + الشروط
    $validated = $request->validate([
        'customer_name'    => 'required|string|max:255',
        'phone'            => 'required|string|max:20',
        'email'            => 'nullable|email|max:255',
        'invoice_number'   => 'nullable|string|max:255',
        'branch_id'        => 'required|exists:branches,id',

        'appointment_date' => [
            'required',
            'date',
            function ($attribute, $value, $fail) {
                if (Carbon::parse($value)->isFriday()) {
                    $fail(__('لا يمكن الحجز يوم الجمعة'));
                }
            },
        ],

        'appointment_time' => [
            'required',
            function ($attribute, $value, $fail) {
                if ($value < '12:00' || $value > '22:00') {
                    $fail(__('المواعيد المتاحة من 12 ظهرًا إلى 10 مساءً'));
                }
            },
        ],

        'image'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'message'          => 'nullable|string|max:1000',
    ]);

    // رفع الصورة إن وجدت
    if ($request->hasFile('image')) {
        $validated['image_path'] = $request->file('image')->store('appointments', 'public');
    }

    // إنشاء الحجز
    MaintenanceAppointment::create($validated);
        // رجوع مع رسالة نجاح
        return redirect()->route('maintenance_appointments')
                         ->with('success', 'تم حفظ الموعد بنجاح'); 
}




    public function formFaq(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ], [
            'name.required' => 'اسم العميل مطلوب.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'message.required' => 'الرسالة مطلوبة.',
        ]);
    
        // تأكد أن موديلك اسمه FormFaq
        form_faq::create([
            'name' => $validatedData['name'],
            'phone_number' => $validatedData['phone_number'] ?? null,
            'email' => $validatedData['email'],
            'message' => $validatedData['message'],
        ]);
    
        return redirect()->route('questions')->with('success', 'تم إرسال استفسارك بنجاح!');
    }
    
        public function franchise_requirements(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:40',
            'nationality' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
        ], [
            'name.required' => 'يرجى إدخال اسم المتقدم.',
            'phone_number.required' => 'يرجى إدخال رقم الجوال.',
            'nationality.required' => 'يرجى إدخال الجنسية.',
            'city.required' => 'يرجى إدخال المدينة.',
            'country.required' => 'يرجى إدخال الدولة.',
        ]);
             // حفظ البيانات في قاعدة البيانات
        Com_con::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'nationality' => $request->nationality,
            'city' => $request->city,
            'country' => $request->country,
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('form_commercial')->with('success', 'تم إرسال الطلب بنجاح!');
    }

public function partnershipss(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'organization_name' => 'required|string|max:255',
            'organization_type' => 'required|in:جهة حكومية,جهة خاصة,وكالة سيارات,معارض سيارات',
            'contact_person' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:partnerships,email',
            'request_details' => 'required|string',
            'commercial_registry_files.*' => 'required|file|max:2048', // التحقق من حجم الملف فقط
        ], [
            'organization_name.required' => 'اسم الجهة مطلوب.',
            'organization_type.required' => 'نوع الجهة مطلوب.',
            'contact_person.required' => 'اسم الشخص المسؤول مطلوب.',
            'phone_number.required' => 'رقم الجوال مطلوب.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'request_details.required' => 'تفاصيل الطلب مطلوبة.',
            'commercial_registry_files.*.max' => 'حجم الملف يجب ألا يتجاوز 2 ميغابايت.',
        ]);

        // حفظ ملفات السجل التجاري
        $uploadedFiles = [];
        if ($request->hasFile('commercial_registry_files')) {
            foreach ($request->file('commercial_registry_files') as $file) {
                $uploadedFiles[] = $this->saveImage($file, 'partnerships/commercial_registries');
            }
        }

        // حفظ بيانات الشراكة
        Partnership::create([
            'organization_name' => $request->organization_name,
            'organization_type' => $request->organization_type,
            'contact_person' => $request->contact_person,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'request_details' => $request->request_details,
            'commercial_registry_files' => json_encode($uploadedFiles), // تخزين الملفات كـ JSON array
        ]);

        return redirect()->route('Partnerships_and_contracts')->with('success', 'تم إرسال الشراكة بنجاح!');
    }

 // إلغاء حجز صيانة
    public function cancelMaintenance($id)
    {
        

        $appointment = MaintenanceAppointment::where('id', $id)
            ->firstOrFail();

        $appointment->update([
            'status' => 'cancelled'
        ]);

        return back()->with('success', __('تم إلغاء موعد الصيانة بنجاح'));
    }

    // إلغاء طلب
    public function cancelOrder($id)
    {
        $order = Order::where('id', $id)
            ->where('status', 'pending')
            ->firstOrFail();

        $order->update([
            'status' => 'cancelled'
        ]);

        return back()->with('success', __('تم إلغاء الطلب بنجاح'));
    }
    
     public function search(Request $request)
    {
        $q = trim($request->get('q'));

        if (!$q) {
            return view('search.index', [
                'query' => '',
                'products' => collect(),
                'packages' => collect(),
                'articles' => collect(),
            ]);
        }

        $products = Product::where(function ($query) use ($q) {
                $query->where('name', 'LIKE', "%$q%")
                      ->orWhere('name_ar', 'LIKE', "%$q%");
            })
            ->get();

        $packages = Package::where(function ($query) use ($q) {
                $query->where('name', 'LIKE', "%$q%")
                      ->orWhere('name_en', 'LIKE', "%$q%");
            })
            ->where('active', 1)
            ->get();

        $articles = Article::where(function ($query) use ($q) {
                $query->where('title', 'LIKE', "%$q%")
                      ->orWhere('title_ar', 'LIKE', "%$q%");
            })
            ->where('active', 1)
            ->get();
            
                $offers = Offers::all();


        return view('search', compact(
            'q',
            'products',
            'packages',
            'articles',
         'offers',

        ));
    }
    
    public function error($code = 500)
{
    return response()->view('errors.custom', [
        'code' => $code,
        'message' => $this->getErrorMessage($code),
    ], $code);
}

private function getErrorMessage($code)
{
    $messages = [
        'ar' => [
            404 => 'الصفحة غير موجودة',
            403 => 'غير مسموح لك بالدخول',
            500 => 'حدث خطأ غير متوقع',
            'default' => 'حدث خطأ ما',
        ],
        'en' => [
            404 => 'Page not found',
            403 => 'Access denied',
            500 => 'Unexpected error occurred',
            'default' => 'Something went wrong',
        ],
    ];

    $locale = app()->getLocale();

    return $messages[$locale][$code]
        ?? $messages[$locale]['default']
        ?? $messages['en']['default'];
}

    
}

