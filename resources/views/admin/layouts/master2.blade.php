<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
        @include('admin.layouts.head')

        <style>
            *{
                font-family: Arial, Helvetica, sans-serif;
            }
            .mb-5, .my-5 {
                justify-content: center !important;
            }
            .del-acc {
                display: flex !important;
                justify-content: center !important;
            }
            label.form-check-label {
                padding-right: 25px;
            }
            .bg-primary-transparent,.bg-white, .main-signup-header .form-control {
                background-color: #000!important;
            }
            .main-signup-header h2  {
                color: #e67923 !important;
            }
            .btn-main-primary{
                background-color:#e67923 !important ;
            }
            .btn-main-primary:hover{
                opacity: .7;
            }
            h5.font-weight-semibold.mb-4 {
                color: #978e8e !important;
            }
            .main-signup-header label, a.btn.btn-link, input#email, input#password {
                color: #ffffff !important;
            }
            a.btn.btn-link:hover{
                color: #e67923 !important;
            }
            body > div.container-fluid > div > div.col-md-6.col-lg-6.col-xl-5.bg-white > div > div > div{
                border-right: white solid 1px;
            }
             .form-control {
                border-width: 1px !important;
                 color: white;
             }
            .form-control:focus{
                border-color: #e67923 !important;
            }
            /* إنشاء حركة صعود وهبوط */
            @keyframes moveUpDown {
                0%, 100% {
                    transform: translateY(0);
                }
                50% {
                    transform: translateY(-20px); /* المسافة إلى الأعلى */
                }
            }

            .animate-logo {
                animation: moveUpDown 2s ease-in-out infinite;
            }
        </style>
	</head>

	<body class="main-body bg-primary-transparent">
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
		@yield('content')
		@include('admin.layouts.footer-scripts')
	</body>
</html>



