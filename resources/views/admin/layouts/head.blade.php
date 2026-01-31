<!-- Title -->
<title>لوحة التحكم</title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('assets/img/media/Logo.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/sidemenu.css')}}">
@yield('css')
<!--- Style css -->
<link href="{{URL::asset('assets/css-rtl/style.css')}}" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{URL::asset('assets/css-rtl/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap" rel="stylesheet">
<style>

    .wizard > .steps {
        padding: 0px;
    }

    .i_tm{
        width: 35px !important;
        font-size: 20px !important;
    }
    .dropdown-item{
        color: red;width: 7%;
        padding: 3px;
    }
    .bx.bx-trash.me-1{
        color: red;
        font-size: large;
    }
    .col-sm-12.col-md-6 {
        display: flex;
    }
    .dropdown-item:active {
        color: #fff;
        text-decoration: none;
        background-color: #ffffff !important;
    }

         /* تنسيقات الرسالة العائمة */
     .floating-alert {
         position: fixed;
         bottom: 20px; /* تغيير الموقع إلى الأسفل */
         right: 20px;
         z-index: 1000;
         padding: 15px;
         background-color: #d4edda;
         border: 1px solid #c3e6cb;
         color: #155724;
         border-radius: 5px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         display: none; /* إخفاء الرسالة في البداية */
         align-items: center;
         font-family: Arial, sans-serif; /* تغيير نمط الخط */
         font-size: 16px; /* تغيير حجم الخط */
         font-weight: bold; /* جعل الخط عريض */
     }
    .floating-alert .check-icon {
        margin-left: 15px;
        font-size: 20px; /* حجم العلامة */
        color: #28a745; /* لون العلامة */
    }
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-20px);
        }
        60% {
            transform: translateY(-10px);
        }
    }
    .floating-alert .check-icon {
        animation: bounce 2s infinite;
    }
    body {
        font-family: 'Cairo', sans-serif !important;
        font-size: larger;

    }
    .pulse-danger {
        background: #e67923 !important;
    }
    .country-Flag img {
        width: 2rem;
        height: 30px;
    }
</style>
