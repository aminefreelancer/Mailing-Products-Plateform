<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!--Favicon -->
    <link rel="icon" href="{{asset('assets/images/brand/favicon.png')}}" type="image/x-icon"/>

    <!-- Styles -->
    
    <!--Bootstrap css -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/dark.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

    <!-- Animate css -->
    <link href="{{asset('assets/css/animated.css')}}" rel="stylesheet" />

	@auth
    <!--Sidemenu css -->
    <link href="{{asset('assets/css/sidemenu.css')}}" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="{{asset('assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/wysiwyag/richtext.css')}}" rel="stylesheet" />
	@endauth

    <!---Icons css-->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" />

    <!-- Color Skin css -->
    <link id="theme" href="{{asset('assets/colors/color1.css')}}" rel="stylesheet" type="text/css"/>

</head>
<body class="@auth app sidebar-mini @else register1 @endauth">

	@guest 
	<div class="page">
		<div class="page-single">
			<div class="container">
					@yield('content')
			</div>
		</div>
	</div>
	@endguest

	@auth

    <div id="app">
        <!---Global-loader-->
		<div id="global-loader" >
			<img src="{{asset('assets/images/brand/1.png')}}" width="64px" alt="Chargement...">
		</div>
		<!--- End Global-loader-->
        <!-- Page -->
		<div class="page">
			<div class="page-main">

				<!--aside open-->
				<aside class="app-sidebar">
					<div class="app-sidebar__logo">
						<a class="header-brand" href="#">
							<img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="GHN">
							<img src="{{asset('assets/images/brand/logo1.png')}}" class="header-brand-img dark-logo" alt="GHN">
							<img src="{{asset('assets/images/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="GHN">
							<img src="{{asset('assets/images/brand/favicon1.png')}}" class="header-brand-img darkmobile-logo" alt="GHN">
						</a>
					</div>

					<ul class="side-menu app-sidebar3">
						<li class="slide">
							<router-link :to="{name: 'dashboard'}" class="side-menu__item" >
							<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"/></svg>
							<span class="side-menu__label">Tableau de bord</span></router-link>
						</li>
						<li class="side-item side-item-category">Gestion Produits</li>
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="#">
								<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M20 17V7c0-2.168-3.663-4-8-4S4 4.832 4 7v10c0 2.168 3.663 4 8 4s8-1.832 8-4zM12 5c3.691 0 5.931 1.507 6 1.994C17.931 7.493 15.691 9 12 9S6.069 7.493 6 7.006C6.069 6.507 8.309 5 12 5zM6 9.607C7.479 10.454 9.637 11 12 11s4.521-.546 6-1.393v2.387c-.069.499-2.309 2.006-6 2.006s-5.931-1.507-6-2V9.607zM6 17v-2.393C7.479 15.454 9.637 16 12 16s4.521-.546 6-1.393v2.387c-.069.499-2.309 2.006-6 2.006s-5.931-1.507-6-2z"/></svg>
							<span class="side-menu__label">Produits GHN</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li><router-link :to="{name: 'newProduct'}" class="slide-item"> Nouveau Produit</router-link></li>
								<li><router-link :to="{name: 'products'}" class="slide-item"> Liste des produits</router-link></li>
							</ul>
						</li>
						
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="#">
							<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"/></svg>
							<span class="side-menu__label">Gestions PDF</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu ">
								<li><router-link :to="{name: 'newFile'}" class="slide-item"> Nouveau PDF</router-link></li>
								<li><router-link :to="{name: 'files'}" class="slide-item"> Liste des PDF</router-link></li>
							</ul>
						</li>
						<li class="side-item side-item-category">Gestion Mailing </li>
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="#">
							<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 2 .001 4H5V5h14zM5 11h8v8H5v-8zm10 8v-8h4.001l.001 8H15z"/></svg>
							<span class="side-menu__label">Mailing</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li><router-link :to="{name: 'newEmail'}" class="slide-item">Nouveau Mail</router-link></li>
								<li><router-link :to="{name: 'email'}" class="slide-item">Format Mailing</router-link></li>
							</ul>
						</li>
                        <li class="slide">
							<router-link :to="{name: 'doctors'}" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M22 7.999a1 1 0 0 0-.516-.874l-9.022-5a1.003 1.003 0 0 0-.968 0l-8.978 4.96a1 1 0 0 0-.003 1.748l9.022 5.04a.995.995 0 0 0 .973.001l8.978-5A1 1 0 0 0 22 7.999zm-9.977 3.855L5.06 7.965l6.917-3.822 6.964 3.859-6.918 3.852z"></path>
                                <path d="M20.515 11.126 12 15.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"></path>
                                <path d="M20.515 15.126 12 19.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"></path>
                            </svg>
							<span class="side-menu__label">Liste Médecins</span></router-link>
						</li>
						
						<li class="side-item side-item-category">Paramètres</li>
                        <li class="slide">
							<a class="side-menu__item"  href="#">
							<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
								<path d="M0 0h24v24H0V0z" fill="none"/>
								<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"/>
							</svg>
							<span class="side-menu__label">Profil</span></a>
						</li>
						<li class="slide">
							<a class="side-menu__item"  href="#">
							<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
								<path d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z"/>
							</svg>
							
							<span class="side-menu__label">Déconnexion</span></a>
						</li>
					</ul>
				</aside>
				<!--aside closed-->

				<!-- App-Content -->
				<div class="app-content main-content">
					<div class="side-app">
                        
                        <!--app header-->
                        <div class="app-header header main-header1">
                            <div class="container-fluid">
                                <div class="d-flex">
                                    <a class="header-brand" href="index.html">
                                        <img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="Azea logo">
                                        <img src="{{asset('assets/images/brand/logo1.png')}}" class="header-brand-img dark-logo" alt="Azea logo">
                                        <img src="{{asset('assets/images/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Azea logo">
                                        <img src="{{asset('assets/images/brand/favicon1.png')}}" class="header-brand-img darkmobile-logo" alt="Azea logo">
                                    </a>
                                    <div class="app-sidebar__toggle d-flex" data-bs-toggle="sidebar">
                                        <a class="open-toggle" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-align-left header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/></svg>
                                        </a>
                                    </div>
                                    <div class="mt-1 d-md-block d-none">
                                        
                                    </div><!-- SEARCH -->
                                    <div class="d-flex order-lg-2 ms-auto main-header-end">
                                        <button  class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="true" aria-label="Toggle navigation">
                                            <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                                        </button>
                                        <div class="navbar navbar-expand-lg navbar-collapse responsive-navbar p-0">
                                            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                                <div class="d-flex order-lg-2">
                                                    <div class="dropdown d-lg-none d-flex responsive-search">
                                                        <a href="#" class="nav-link icon" data-bs-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="header-icon search-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/></svg>
                                                        </a>
                                                        <div class="dropdown-menu header-search dropdown-menu-start">
                                                            <div class="input-group w-100 p-2">
                                                                <input type="text" class="form-control" placeholder="Search....">
                                                                <button class="btn btn-primary-color" type="submit">
                                                                    <svg class="header-icon search-icon p-1 mt-1" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div><!-- SEARCH -->
                                                    <div class="dropdown d-flex">
                                                        <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                                            <span class="light-layout"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M20.742 13.045a8.088 8.088 0 0 1-2.077.271c-2.135 0-4.14-.83-5.646-2.336a8.025 8.025 0 0 1-2.064-7.723A1 1 0 0 0 9.73 2.034a10.014 10.014 0 0 0-4.489 2.582c-3.898 3.898-3.898 10.243 0 14.143a9.937 9.937 0 0 0 7.072 2.93 9.93 9.93 0 0 0 7.07-2.929 10.007 10.007 0 0 0 2.583-4.491 1.001 1.001 0 0 0-1.224-1.224zm-2.772 4.301a7.947 7.947 0 0 1-5.656 2.343 7.953 7.953 0 0 1-5.658-2.344c-3.118-3.119-3.118-8.195 0-11.314a7.923 7.923 0 0 1 2.06-1.483 10.027 10.027 0 0 0 2.89 7.848 9.972 9.972 0 0 0 7.848 2.891 8.036 8.036 0 0 1-1.484 2.059z"/></svg></span>
                                                            <span class="dark-layout"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M6.993 12c0 2.761 2.246 5.007 5.007 5.007s5.007-2.246 5.007-5.007S14.761 6.993 12 6.993 6.993 9.239 6.993 12zM12 8.993c1.658 0 3.007 1.349 3.007 3.007S13.658 15.007 12 15.007 8.993 13.658 8.993 12 10.342 8.993 12 8.993zM10.998 19h2v3h-2zm0-17h2v3h-2zm-9 9h3v2h-3zm17 0h3v2h-3zM4.219 18.363l2.12-2.122 1.415 1.414-2.12 2.122zM16.24 6.344l2.122-2.122 1.414 1.414-2.122 2.122zM6.342 7.759 4.22 5.637l1.415-1.414 2.12 2.122zm13.434 10.605-1.414 1.414-2.122-2.122 1.414-1.414z"/></svg></span>
                                                        </a>
                                                    </div><!-- Theme-Layout -->
                                                    <div class="dropdown   header-fullscreen d-flex" >
                                                        <a  class="nav-link icon full-screen-link p-0"  id="fullscreen-button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"/></svg>
                                                        </a>
                                                    </div>
                                                    
                                                    
                                                    <div class="dropdown profile-dropdown d-flex">
                                                        <a href="#" class="nav-link pe-0 leading-none" data-bs-toggle="dropdown">
                                                            <span class="header-avatar1">
                                                                <img src="{{asset('assets/images/brand/favicon1.png')}}" alt="GHN" class="avatar avatar-md brround">
                                                            </span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow animated">
                                                            <div class="text-center">
                                                                <div class="text-center user pb-0 font-weight-bold">{{auth()->user()->name}}</div>
                                                                <span class="text-center user-semi-title">ADMIN</span>
                                                                <div class="dropdown-divider"></div>
                                                            </div>
                                                            <a class="dropdown-item d-flex" href="#">
                                                                <svg class="header-icon me-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"/></svg>
                                                                <div class="fs-13">Paramètres</div>
                                                            </a>
                                                            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item d-flex" href="#">
                                                                <svg class="header-icon me-2" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"/></g><g><path d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z"/></g></svg>
                                                                <div class="fs-13">Déconnexion</div>
                                                            </a>
															<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																@csrf
															</form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/app header-->
						<router-view></router-view>
                        <vue-progress-bar></vue-progress-bar>

					</div>
				</div><!-- right app-content-->
			</div>

			<!--Footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 text-center">
							Copyright © 2022 <a href="#">GHN</a>. All rights reserved
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->
		</div>
		<!-- End Page -->

        <!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fe fe-chevron-up"></i></a>

    </div>

	@endauth

    <!-- Jquery js-->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

    <!-- Bootstrap5 js-->
    <script src="{{asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{ asset('js/app.js') }}" ></script>

    <!--Othercharts js-->
    <script src="{{asset('assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

    <!-- Circle-progress js-->
    <script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

    <!-- Jquery-rating js-->
    <script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

	@auth
    <!--Sidemenu js-->
    <script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

    <!-- P-scroll js-->
    <script src="{{asset('assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
    <script src="{{asset('assets/plugins/p-scrollbar/p-scroll1.js')}}"></script>
    <script src="{{asset('assets/plugins/p-scrollbar/p-scroll.js')}}"></script>
	
	@endauth 

	@guest 
	<!-- Show Password -->
	<script src="{{asset('assets/js/bootstrap-show-password.min.js')}}"></script>
	@endguest 

    <!-- Custom js-->
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <!-- Scripts -->
    
</body>
</html>
