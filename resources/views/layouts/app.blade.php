<!DOCTYPE html>
<html data-navigation-type="default" data-navbar-horizontal-shape="default" lang="en-US" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shipping App</title>

    <script src="{{ asset('assets/js/config.js') }}"></script>
    <link rel="icon" href="{{ asset('assets/img/image.png') }}">
    <script src="{{ asset('assets/js/js.js') }}"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <link href="{{ asset('assets/css/theme.min.css') }}" type="text/css" rel="stylesheet" id="style-default">
    <style>
        <style>
            .timeline_container-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 1000px;
                overflow: auto;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
            }
            .timeline_container-wrapper::-webkit-scrollbar {
                display: none;

            }
            .timeline_container {
                display: flex;
            }

            .timeline_horizontal.timeline {
                padding: 20px;
                /* Adjust the padding value as needed */
            }

            @keyframes animation-timeline-current {
                from {
                    transform: translate(-50%, -50%) scale(0);
                    opacity: 1;
                }

                to {
                    transform: translate(-50%, -50%) scale(2);
                    opacity: 0;
                }
            }

            @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700');

            .timeline_container ul {
                margin: 0;
                list-style: none;
                position: relative;
                padding: 1px 50px;
                color: #000000;
                font-size: 13px;
            }

            .timeline_container::-webkit-scrollbar {
                display: none;
            }

            .timeline_container ul li {
                position: relative;
                margin-left: 30px;
                background-color: #00000000;
                padding: 14px;
                border-radius: 6px;
                width: 250px;
                box-shadow: 0 0 4px rgba(0, 0, 0, 0.12), 0 2px 2px rgba(0, 0, 0, 0.537);
            }

            .timeline_container ul li:not(:first-child) {
                margin-top: 60px;
            }

            .timeline_container ul li>span {
                width: 2px;
                height: 100%;
                background: #074198;
                left: -30px;
                top: 0;
                position: absolute;
            }

            .timeline_container ul li>span:before,
            .timeline_container ul li>span:after {
                content: '';
                width: 8px;
                height: 8px;
                border-radius: 50%;
                border: 2px solid #074198;
                position: absolute;
                background: #074198;
                left: -5px;
                top: 0;
            }

            .timeline_container ul li>span:after {
                top: 100%;
            }

            .timeline_container ul li>div {
                margin-left: 10px;
            }

            .timeline_container div .title,
            .timeline_container div .type {
                font-weight: 600;
                font-size: 12px;
            }

            .timeline_container div .info {
                font-weight: 300;
            }

            .timeline_container div>div {
                margin-top: 5px;
            }

            span.number {
                height: 100%;
            }

            span.number span {
                position: absolute;
                font-size: 10px;
                left: -50px;
                font-weight: bold;
            }

            span.number span:first-child {
                top: 0;
            }

            span.number span:last-child {
                top: 100%;
            }
        </style>
    </style>
    @livewireStyles

</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

        <nav class="navbar navbar-top fixed-top bg-primary navbar-expand" id="navbarDefault">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="navbar-logo">
                    <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent"
                        type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                        aria-controls="navbarVerticalCollapse" aria-expanded="false"
                        aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                                class="toggle-line"></span></span></button>
                    <a class="navbar-brand me-1 me-sm-3" href="{{ url('/home') }}">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                {{--  <img src="{{ asset('assets/img/pbbbbi.png') }}" alt="phoenix" width="40"
                                    class="d-sm-none d-xl-block">  --}}
                                <div class="d-flex align-items-center">
                                    {{--  <img src="{{ asset('assets/img/removebg.png') }}" alt="phoenix" width="46"
                                        height="46" class="ms-3 d-sm-none d-xl-block">  --}}
                                    <p class="logo-text text-white d-none d-sm-block mx-2">Shipping App
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <ul class="navbar-nav navbar-nav-icons flex-row">
                    <li class="nav-item">
                        <div class="theme-control-toggle fa-icon-wait px-2"><input
                                class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                                data-theme-control="phoenixTheme" value="dark" id="themeControlToggle"><label
                                class="mb-0 theme-control-toggle-label theme-control-toggle-light"
                                for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"
                                aria-label="Switch theme" data-bs-original-title="Switch theme"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon icon">
                                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                </svg></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark"
                                for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"
                                aria-label="Switch theme" data-bs-original-title="Switch theme"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun icon">
                                    <circle cx="12" cy="12" r="5"></circle>
                                    <line x1="12" y1="1" x2="12" y2="3"></line>
                                    <line x1="12" y1="21" x2="12" y2="23"></line>
                                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                    <line x1="1" y1="12" x2="3" y2="12"></line>
                                    <line x1="21" y1="12" x2="23" y2="12"></line>
                                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                </svg></label></div>
                    </li>
                    <li class="nav-item dropdown">
                        {{--  <a class="nav-link position-relative" href="#" style="min-width: 2.25rem"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            data-bs-auto-close="outside">
                            <span data-feather="bell" style="height: 20px; width: 20px; color:white"></span>
                            <!-- Notification badge with a number -->
                            <span class="position-absolute top-0 end-0 badge rounded-pill bg-danger"
                                id="notifcount">0</span>
                        </a>  --}}
                        <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret"
                            id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                            <div class="card position-relative border-0">
                                <div class="card-header p-2">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="text-body-emphasis mb-0">Notificatons</h5>
                                        {{-- <button
                                        class="btn btn-link p-0 fs-9 fw-normal" type="button">Mark all as
                                        read</button> --}}
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="scrollbar-overlay" style="max-height: 27rem;" id="notif">

                                        {{-- <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                                        <div class="d-flex align-items-center justify-content-between position-relative" >

                                             <div class="d-none d-sm-block"><button
                                                    class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    </div>
                                </div>
                                <div class="card-footer p-0 border-top border-translucent border-0">
                                    <div class="my-2 text-center fw-bold fs-10 text-body-tertiary text-opactity-85"><a
                                            class="fw-bolder" href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser"
                            href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-l ">
                                {{--  <img class="rounded-circle " src="{{ asset('assets/img/team/72x72/60.png') }}"
                                    alt="">  --}}
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
                            aria-labelledby="navbarDropdownUser">
                            <div class="card position-relative border-0">
                                <div class="card-body p-0">
                                    <div class="text-center pt-4 pb-3">
                                        <div class="avatar avatar-xl ">
                                            <img class="rounded-circle "
                                                src="{{ asset('assets/img/team/72x72/60.png') }}" alt="">
                                        </div>
                                        {{--  <h6 class="mt-2 text-body-emphasis">{{ Auth::user()->name }}</h6>  --}}
                                    </div>
                                </div>


                                <hr>


                                <div class="px-2 my-1 mb-1">
                                    {{--  <a
                                        class="btn btn-phoenix-secondary border mb-1 d-flex flex-center w-100"
                                        href="{{ route('home') }}">
                                        <i class="fa fa-arrow-left mx-2" aria-hidden="true"></i>
                                        Go Back</a>  --}}
                                    <a class="btn btn-phoenix-secondary mb-2 border d-flex flex-center w-100"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-log-out me-2">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12">
                                            </line>
                                        </svg>Sign out</a>
                                </div>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
            </div>
            </li>
            </ul>



            </div>
        </nav>


        <div class="content"> @yield('content')</div>


    </main>

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('livewire:load', function() {

                const link = document.getElementById('sensor20');
                link.addEventListener('click', function(event) {
                    Livewire.stop()
                    console.log('All HTTP requests aborted.');
                });
            });
        });
    </script>
    <script>
        {{--  Livewire.hook('message.sent', (message, component) => {
            console.log('loading');
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timerProgressBar: true,
                didOpen: (toast) => {
                    Swal.showLoading();
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                title: "Loading new data please wait"
            });
        })  --}}

        Livewire.hook('message.failed', (message, component) => {
            //location.reload();
        })
        {{--  Livewire.hook('message.processed', (message, component) => {
            console.log('done');
            if (typeof Swal !== 'undefined') {
                Swal.close();
            }
        })  --}}
    </script>
    <script src="{{ asset('vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
    <script src="{{ asset('vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('vendors/dayjs/dayjs.min.js') }}"></script>
    <script src="{{ asset('assets/js/phoenix.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.js"></script>
    <script src="{{ asset('vendors/apexcharts-bundle/dist/apexcharts.js') }}"></script>

</body>


</html>
