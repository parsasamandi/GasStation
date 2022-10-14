<!DOCTYPE html>
<html lang="en">
    
@section('stylesheet')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    {{-- Admin Style --}}
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
    {{-- Mix App --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
@show


<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/">Pouya Samandi</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    {{-- Main Menu --}}
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        {{-- Admin --}}
                        <div class="sb-sidenav-menu-heading">Admin</div>
                        <a class="nav-link" href="\admin\list">
                            <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                            Admin
                        </a>

                        {{-- Users --}}
                        <div class="sb-sidenav-menu-heading">User</div>
                        <a class="nav-link" href="\user\list">
                            <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                            User
                        </a>

                        {{-- CV --}}
                        <div class="sb-sidenav-menu-heading">CV</div>

                        {{-- Skill --}}
                        

                        {{-- Refree --}}
                        

                        {{-- Experiences --}}
                        

                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            {{-- Content --}}
            <main>
                @yield('content')
            </main>
            {{-- Footer --}}
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <a class="text-gray" target="_blank" href="https://github.com/StartBootstrap/startbootstrap-sb-admin">
                            <div>
                                Copyright &copy; Start Bootstrap - SB Admin v6.0.1
                            </div> 
                        </a>
                        <div id="conditions">
                            Privacy Policy
                            &middot;
                            Terms &amp; Conditions
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- SCRIPTS -->
    @section('scripts')
        <!-- Mix -->
        <script src="{{ mix('js/app.js') }}"></script>
        <!-- Requests -->
        <script src="{{ asset('js/requestHandler.js') }}"></script>
        <!-- Scripts -->
        <script src="{{ asset('js/scripts.js') }}"></script>

        <script>
            // Close modal on button click
            $(".close").click(function(){
                $("#formModal").modal('hide');
                $("#confirmationModal").modal('hide');
            });

            // Ajax Setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processing: true,
                dataType: "json"
            });

            // Select2
            $('select').select2({
                width: '100%'
            });

        </script>
    @show

</body>

</html>
