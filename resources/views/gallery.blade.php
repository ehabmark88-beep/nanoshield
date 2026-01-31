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

        /* الإعدادات العامة */
        .container {
            width: 80% !important;
            margin: auto;
            gap: 20px;
            padding: 20px 0;
            display: grid !important;
            grid-template-columns: repeat(4, minmax(250px, 1fr)) !important;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-bottom: 4px solid #e47823; /* لون الموقع الأساسي */
        }

        .card h3 {
            font-size: 20px;
            color: #e47823; /* لون الموقع الأساسي */
            margin: 15px 0;
        }

        .card p {
            padding: 0 15px 15px;
            color: #666;
        }

        /* تصميم الأجهزة اللوحية (تابلت) */
        @media (max-width: 1024px) {
            .container {
                width: 90%;
                grid-template-columns: repeat(2, minmax(200px, 1fr)); /* عمودين على التابلت */
                gap: 15px;
            }

            .card h3 {
                font-size: 18px; /* حجم أصغر للعنوان */
            }

            .card p {
                font-size: 14px; /* حجم أصغر للنص */
            }
        }

        /* تصميم الهواتف المحمولة (عرض بطاقات بشكل عمودي) */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                grid-template-columns: 1fr !important; /* عمود واحد على الهواتف */
                gap: 10px;
            }

            .card img {
                height: 150px; /* تقليل ارتفاع الصورة */
            }

            .card h3 {
                font-size: 16px; /* حجم أصغر للعنوان */
            }

            .card p {
                font-size: 13px; /* حجم أصغر للنص */
                padding: 0 10px 10px;
            }
        }
        
   .image-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
    opacity: 0;
    transform: scale(0.95);
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.image-modal.show {
    display: flex;
    opacity: 1;
    transform: scale(1);
}

.image-modal img {
    max-width: 90%;
    max-height: 90%;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.image-modal img:hover {
    transform: scale(1.02);
}

.image-modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    font-size: 30px;
    color: white;
    cursor: pointer;
    background: rgba(0, 0, 0, 0.6);
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    z-index: 1001;
    transition: background 0.3s ease;
}

.image-modal-close:hover {
    background: rgba(255, 255, 255, 0.6);
    color: black;
}

body.modal-open {
    overflow: hidden;  /* منع التمرير عند فتح المودال */
}

.container {
    transition: filter 0.3s ease;
}

.container.blurred {
    filter: blur(5px);
}

.image-modal img {
    max-width: 90%;
    max-height: 90%;
    border-bottom: 0 solid #e47823;  /* البوردر يبدأ بـ 0 */
    transition: border-bottom 0.3s ease;
    border-radius: 10px;
}

.image-modal.show img {
    border-bottom: 8px solid #e47823;  /* البوردر يظهر تدريجيًا */
}


    </style>

@endsection

@section('content')

    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/gallery.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white;font-size: 40px !important;">{{ __('messages.image_gallery') }}</h1>
            </div>
            <div>
            </div>
        </div>
    </div><br>

    <section class="container">

        @foreach($galleries as $gallery)
            <div class="card">
                <img src="{{ asset('img/gallery/' . $gallery->image) }}" alt="{{ __('messages.image') }} 1">
            </div>
        @endforeach
    </section>

<div class="image-modal" id="imageModal">
    <button class="image-modal-close" id="closeModal">&times;</button>
    <img id="modalImage" src="" alt="Full Image">
</div>


@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const closeModal = document.getElementById('closeModal');
        const container = document.querySelector('.container');  // العنصر الذي نريد إضافة تأثير Blur له

        document.querySelectorAll('.card img').forEach(img => {
            img.addEventListener('click', function() {
                modal.style.display = 'flex';
                setTimeout(() => {
                    modal.classList.add('show');
                    container.classList.add('blurred');  // إضافة تأثير Blur
                    document.body.classList.add('modal-open');  // منع التمرير
                }, 10);
                modalImage.src = this.src;
            });
        });

        closeModal.addEventListener('click', closeModalWithAnimation);

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModalWithAnimation();
            }
        });

        function closeModalWithAnimation() {
            modal.classList.remove('show');
            container.classList.remove('blurred');  // إزالة تأثير Blur
            document.body.classList.remove('modal-open');  // إعادة التمرير
            setTimeout(() => {
                modal.style.display = 'none';
            }, 300);
        }
    });
</script>




    <script>

    </script>
@endsection

