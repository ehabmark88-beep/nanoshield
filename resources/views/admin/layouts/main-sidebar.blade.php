<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
{{--				<a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>--}}
                <img src="{{URL::asset('assets/img/media/Logo.2.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto animate-logo" alt="logo">
            </div>
            {{--            <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><button class="btn btn-outline-secondary btn-rounded btn-block">Secondary</button></div>--}}
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">

                            <img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/user.png')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::guard('admin')->user()->name }}</h4>
							<span class="mb-0 text-muted">Admin</span>
						</div>

					</div>
				</div>
				<ul class="side-menu">
					<li class="side-item side-item-category">الرئيسي</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/' . $page='admin/dashboard/home') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">الرئيسية</span></a>
					</li>
                    <li class="slide">
                        <a class="side-menu__item" href="{{ url('/' . $page='admin/dashboard/admins') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">حسابات الفروع</span></a>
                    </li>
<li class="slide">
    <a class="side-menu__item" href="{{ route('admin.website.settings') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0V0z" fill="none"/>
            <path d="M4 6h16v10H4z" opacity=".3"/>
            <path d="M2 4h20v14H2V4zm2 2v10h16V6H4zm6 14h4v2h-4z"/>
        </svg>
        <span class="side-menu__label">إعدادات الموقع</span>
    </a>
</li>

                    					  <li class="slide">
                        <a class="side-menu__item" href="{{ url('/' . $page='admin/dashboard/seo-settings') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/>
                                <path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/>
                            </svg>
                            <span class="side-menu__label">إعدادات السيو</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" href="{{ url('/' . $page='dashbook') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/>
                                <path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/>
                            </svg>
                            <span class="side-menu__label">الحجوزات</span>
                        </a>
                    </li>

					<li class="side-item side-item-category">عام</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                                <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>
                            </svg>
                            <span class="side-menu__label">الخدامات</span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
						<ul class="slide-menu">
{{--                            <li><a class="slide-item" href="{{ route('admin.dashboard.wash_booking.index') }}">الحجوزات</a></li>--}}
                            <li><a class="slide-item" href="{{ route('admin.dashboard.package_category.index') }}">اقسام الباقات</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.packages.index') }}">الباقات</a></li>
							<li><a class="slide-item" href="{{ route('admin.dashboard.addition_service.index') }}">الخدمات الاضافية</a></li>
							<li><a class="slide-item" href="{{ route('admin.dashboard.coupons.index') }}">قسائم الخصم</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.cars.index') }}">السيارات</a></li>
                        </ul>
					</li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                                <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>
                            </svg>
                            <span class="side-menu__label">المعرض</span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('admin.dashboard.galleries.index') }}">معرض الصور</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.video_gallery.index') }}">معرض الفديو</a></li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                                <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>
                            </svg>
                            <span class="side-menu__label">المقاولات</span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('admin.dashboard.construction_booking.index') }}">حجز المقاولات</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.construction_service.index') }}">اقسام المقاولات</a></li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                                <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>
                            </svg>
                            <span class="side-menu__label">منتجات نانو</span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('admin.dashboard.orders.index') }}">الطلبات</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.products.index') }}">المنتجات</a></li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                                <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>
                            </svg>
                            <span class="side-menu__label">الفروع</span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('admin.dashboard.branches.index') }}">الفروع</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.governorates.index') }}">مناطق الفروع</a></li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                                <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>
                            </svg>
                            <span class="side-menu__label">الموقع</span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('admin.dashboard.users.index') }}">المستخدمين</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.sliders.index') }}">البنارات الرئيسية</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.offers.index') }}">العروض</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.before_after.index') }}">قبل و بعد</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.media.index') }}">الاخبار</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.partners.index') }}">الشركاء</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.reviews.index') }}">اراء العملاء</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.questions.index') }}">الأسئلة الشائعة</a></li>
                          <li><a class="slide-item" href="{{ route('admin.dashboard.articles.index') }}">المقالات</a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                                <path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>
                            </svg>
                            <span class="side-menu__label">التواصل</span>
                            <i class="angle fe fe-chevron-down"></i>
                        </a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ route('admin.dashboard.contact_us.index') }}">المتواصلين معنا</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.recruitments.index') }}">التوظيف</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.commercial_concession.index') }}">الامتياز التجاري</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.complaint.index') }}">الشكاوي</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.partnerships.index') }}">الشراكات و العقود</a></li>
                            <li><a class="slide-item" href="{{ route('admin.dashboard.form-faq.index') }}">الاسئلة</a></li>

                        </ul>
                    </li>
				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
