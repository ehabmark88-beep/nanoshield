@extends('layouts.pages.master')

@section('title')
    @if (app()->getLocale() === 'en')
        {{ $seoSettings->first()->title_en ?? 'Nano Shield' }}
    @else
        {{ $seoSettings->first()->title ?? 'نانو شيلد' }}
    @endif
@endsection

@section('description')
    @if (app()->getLocale() === 'en')
        {{ $seoSettings->first()->meta_description_en ?? 'Nano Shield' }}
    @else
        {{ $seoSettings->first()->meta_description ?? 'نانو شيلد' }}
    @endif
@endsection

@section('keywords')
    @if (app()->getLocale() === 'en')
        {{ $seoSettings->first()->meta_keywords_en ?? 'Nano Shield' }}
    @else
        {{ $seoSettings->first()->meta_keywords ?? 'نانو شيلد' }}
    @endif
@endsection

@section('css')
    <style>
    
        /* Section Styling */
        .custom-product-section {
            padding: 20px;
            width: 70%;
            margin: auto;
        }

        /* Slider Container */
        .custom-slider-container {
            position: relative;
            overflow: hidden;
        }

        /* Product Grid */
        .custom-slider {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        /* Individual Product Styling */
        .custom-product {
            background-color: #fff;
            border: 1px solid #f3d19c; /* Light orange border */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: calc(25% - 20px); /* 4 products per row */
            transition: transform 0.3s ease-in-out;
        }

        .custom-product:hover {
            transform: translateY(-5px);
        }

        /* Product Image */
        .custom-product-image {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #f3d19c;
        }

        /* Product Info */
        .custom-product-info {
            padding: 15px;
            text-align: center;
        }

        .custom-product-info h3 {
            font-size: 15px;
            color: #333;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .custom-product-info p {
            font-size: 14px;
            color: #777;
            margin-bottom: 15px;
        }

        /* Price Styling */
        .custom-d-flix {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 5px;
        }

        .custom-d-flix del {
            font-size: 14px;
            color: #999;
        }

        .custom-price {
            font-size: 22px;
            color: #e27723;
            font-weight: bold;
        }

        /* Button Styling */
        .custom-add-to-cart-btn {
            background-color: #e27723;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .custom-add-to-cart-btn:hover {
            background-color: #cf661d;
        }

        /* Slider Buttons */
        .custom-ctrl-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 165, 0, 0.8);
            border: none;
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
            color: #fff;
            font-size: 18px;
            z-index: 10;
            transition: background-color 0.3s ease;
        }

        .custom-ctrl-btn:hover {
            background-color: rgba(255, 140, 0, 0.8);
        }

        .custom-prev-btn {
            left: 10px;
        }

        .custom-next-btn {
            right: 10px;
        }

        .custom-product-info {
            display: grid;
        }
        /* Responsive Styling */

        /* Tablets (2 products per row) */
        @media (max-width: 768px) {
            .custom-product {
                width: calc(50% - 20px); /* 2 products per row */
            }

            .custom-ctrl-btn {
                font-size: 16px;
                padding: 8px;
            }
        }

        /* Mobile (1 product per row) */
        @media (max-width: 480px) {
            .custom-product {
                width: 100%; /* Full width */
            }

            .custom-product-info {
                padding: 10px;
            }

            .custom-product-info h3 {
                font-size: 16px;
            }

            .custom-product-info p {
                font-size: 12px;
            }

            .custom-add-to-cart-btn {
                font-size: 14px;
                padding: 8px 12px;
            }
        }

        button.custom-ctrl-btn.custom-next-btn,button.custom-ctrl-btn.custom-prev-btn {
            display: none;
        }

    </style>
@endsection

@section('content')

    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/products.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white;font-size: 60px">{{ __('messages.our_products') }} </h1>
            </div>
            <div></div>
        </div>
    </div><br>
    <div>
        <br>
    </div>
    <livewire:productlist />
@endsection

@section('js')
<script>
document.addEventListener("DOMContentLoaded", function () {

    // تابع لمعرفه أن العنصر مرئي (لا يكون display: none ولا أحد والديه مخفي)
    function isVisible(elem) {
        if (!elem) return false;
        const style = window.getComputedStyle(elem);
        if (style.display === 'none' || style.visibility === 'hidden' || style.opacity === '0') return false;
        // also check ancestors
        let parent = elem.parentElement;
        while (parent) {
            const ps = window.getComputedStyle(parent);
            if (ps.display === 'none' || ps.visibility === 'hidden' || ps.opacity === '0') return false;
            parent = parent.parentElement;
        }
        return true;
    }

    // مجموعة لحفظ الـ IDs المضافة حتى لا تتكرر عبر جميع الكونتينرز
    const addedProductIds = new Set();

    document.querySelectorAll("swiper-container").forEach(container => {
        // إذا العنصر غير مرئي على الصفحة في الوقت الحالي — نتجاهله
        if (!isVisible(container)) return;

        // ننشئ حاوية جديدة بديلة
        const newContainer = document.createElement("div");
        newContainer.className = container.className || "";
        newContainer.style.display = "grid";
        newContainer.style.gap = "20px";

        // وظيفة لتعيين أعمدة الشبكة حسب العرض
        function setColumns() {
            newContainer.style.gridTemplateColumns =
                window.innerWidth >= 1024 ? "repeat(4, 1fr)" : "repeat(1, 1fr)";
        }
        setColumns();
        window.addEventListener("resize", setColumns);

        // نأخذ كل slides ونضيفها مع تجنب التكرار
        container.querySelectorAll("swiper-slide").forEach(slide => {
            // نحاول استخراج id البطاقة داخل الـ slide (مثلاً id="custom-product123")
            // افتراض أن داخل الـ slide توجد عنصر ب id يبدأ بـ "custom-product"
            const productEl = slide.querySelector('[id^="custom-product"]');
            let productId = null;
            if (productEl && productEl.id) {
                // نستخرج الرقم أو المعرف من الـ id الكامل
                productId = productEl.id.replace(/^custom-product/, '').trim();
            }

            // إذا معرف المنتج موجود مسبقًا في المجموعة — نتجاهل هذه البطاقة
            if (productId && addedProductIds.has(productId)) {
                return; // skip duplicate
            }

            // ننشيء عنصر جديد وننسخ المحتوى
            const newItem = document.createElement("div");
            newItem.innerHTML = slide.innerHTML;
            newItem.style.width = "100%";

            // إذا وجدنا productId نضيفه للمجموعة حتى لا نكرر
            if (productId) {
                addedProductIds.add(productId);
                // ونحافظ على نفس الـ id داخل العنصر الجديد (اختياري)
                const innerProduct = newItem.querySelector('[id^="custom-product"]');
                if (innerProduct) {
                    innerProduct.id = 'custom-product' + productId;
                }
            }

            newContainer.appendChild(newItem);
        });

        // إذا ما اتضاف أي عنصر (مثلاً لأن كلهم مكررين) — نترك العنصر الأصلي
        if (newContainer.children.length > 0) {
            container.replaceWith(newContainer);
        } else {
            // لا نستبدل أي شيء إذا لم نضيف عناصر جديدة
        }
    });

});
</script>
@endsection

