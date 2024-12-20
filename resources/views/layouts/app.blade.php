<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>QUẢN LÝ ĐỘC GIẢ</title>
    <!-- Script para el tema oscuro -->
    <script src="color-modes.js"></script>
    <!-- Bootstrao 5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Iconos de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Estilos Basicos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            height: 100%;
        }

        aside {
            /* border: 1px yellow solid; */
            position: fixed;
            overflow: auto;
            height: calc(100vh - 68px);
            justify-content: flex-start;
            align-self: flex-start;

        }

        main {
            position: relative;
            overflow: auto;
            margin-left: auto;
            justify-content: flex-end;
            align-self: flex-end;
        }

        #sidebarshow {
            display: none;

        }

        @media screen and (max-width: 575px) {
            #sidebarshow {
                display: inline;
            }

            #sidebartoggle {
                display: none;
            }
        }

        .fixed-bottom-end {
            position: fixed;
            bottom: 10px;
            left: 10px;
            z-index: 1050;
        }

        body {
            margin-top: 20px;
        }

        .footer_area {
            position: relative;
            z-index: 1;
            overflow: hidden;
            box-shadow: 0 8px 48px 8px rgba(47, 91, 234, 0.175);
            padding: 60px;
        }

        .footer_area .row {
            margin-left: -25px;
            margin-right: -25px;
        }

        .footer_area .row .col,
        .footer_area .row .col-1,
        .footer_area .row .col-10,
        .footer_area .row .col-11,
        .footer_area .row .col-12,
        .footer_area .row .col-2,
        .footer_area .row .col-3,
        .footer_area .row .col-4,
        .footer_area .row .col-5,
        .footer_area .row .col-6,
        .footer_area .row .col-7,
        .footer_area .row .col-8,
        .footer_area .row .col-9,
        .footer_area .row .col-auto,
        .footer_area .row .col-lg,
        .footer_area .row .col-lg-1,
        .footer_area .row .col-lg-10,
        .footer_area .row .col-lg-11,
        .footer_area .row .col-lg-12,
        .footer_area .row .col-lg-2,
        .footer_area .row .col-lg-3,
        .footer_area .row .col-lg-4,
        .footer_area .row .col-lg-5,
        .footer_area .row .col-lg-6,
        .footer_area .row .col-lg-7,
        .footer_area .row .col-lg-8,
        .footer_area .row .col-lg-9,
        .footer_area .row .col-lg-auto,
        .footer_area .row .col-md,
        .footer_area .row .col-md-1,
        .footer_area .row .col-md-10,
        .footer_area .row .col-md-11,
        .footer_area .row .col-md-12,
        .footer_area .row .col-md-2,
        .footer_area .row .col-md-3,
        .footer_area .row .col-md-4,
        .footer_area .row .col-md-5,
        .footer_area .row .col-md-6,
        .footer_area .row .col-md-7,
        .footer_area .row .col-md-8,
        .footer_area .row .col-md-9,
        .footer_area .row .col-md-auto,
        .footer_area .row .col-sm,
        .footer_area .row .col-sm-1,
        .footer_area .row .col-sm-10,
        .footer_area .row .col-sm-11,
        .footer_area .row .col-sm-12,
        .footer_area .row .col-sm-2,
        .footer_area .row .col-sm-3,
        .footer_area .row .col-sm-4,
        .footer_area .row .col-sm-5,
        .footer_area .row .col-sm-6,
        .footer_area .row .col-sm-7,
        .footer_area .row .col-sm-8,
        .footer_area .row .col-sm-9,
        .footer_area .row .col-sm-auto,
        .footer_area .row .col-xl,
        .footer_area .row .col-xl-1,
        .footer_area .row .col-xl-10,
        .footer_area .row .col-xl-11,
        .footer_area .row .col-xl-12,
        .footer_area .row .col-xl-2,
        .footer_area .row .col-xl-3,
        .footer_area .row .col-xl-4,
        .footer_area .row .col-xl-5,
        .footer_area .row .col-xl-6,
        .footer_area .row .col-xl-7,
        .footer_area .row .col-xl-8,
        .footer_area .row .col-xl-9,
        .footer_area .row .col-xl-auto {
            padding-right: 25px;
            padding-left: 25px;
        }

        .single-footer-widget {
            position: relative;
            z-index: 1;
        }

        .single-footer-widget .copywrite-text a {
            color: #747794;
            font-size: 1rem;
        }

        .single-footer-widget .copywrite-text a:hover,
        .single-footer-widget .copywrite-text a:focus {
            color: #3f43fd;
        }

        .single-footer-widget .widget-title {
            margin-bottom: 1.5rem;
        }

        .single-footer-widget .footer_menu li a {
            color: #747794;
            margin-bottom: 1rem;
            display: block;
            font-size: 1rem;
        }

        .single-footer-widget .footer_menu li a:hover,
        .single-footer-widget .footer_menu li a:focus {
            color: #3f43fd;
        }

        .single-footer-widget .footer_menu li:last-child a {
            margin-bottom: 0;
        }

        .footer_social_area {
            position: relative;
            z-index: 1;
        }

        .footer_social_area a {
            border-radius: 50%;
            height: 40px;
            text-align: center;
            width: 40px;
            display: inline-block;
            background-color: #f5f5ff;
            line-height: 40px;
            -webkit-box-shadow: none;
            box-shadow: none;
            margin-right: 10px;
        }

        .footer_social_area a i {
            line-height: 36px;
        }

        .footer_social_area a:hover,
        .footer_social_area a:focus {
            color: #ffffff;
        }

        @-webkit-keyframes bi-cycle {
            0% {
                left: 0;
            }

            100% {
                left: 100%;
            }
        }

        @keyframes bi-cycle {
            0% {
                left: 0;
            }

            100% {
                left: 100%;
            }
        }

        ol li,
        ul li {
            list-style: none;
        }

        ol,
        ul {
            margin: 0;
            padding: 0;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .hint-text {
            float: left;
            margin-right: 10px;
        }

        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: 0.25rem;
        }

        .pagination li {
            display: inline;
        }

        .pagination li a,
        .pagination li span {
            position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6;
            text-decoration: none;
        }

        .pagination li a:hover {
            color: #0056b3;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }

        .pagination li.active span {
            z-index: 1;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .pagination li.disabled span {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
        }
    </style>


    <!-- Custom styles for this template -->

</head>

<body class="bg-body-tertiary">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>LIBRARY MANAGEMENT</title>
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
            </path>
        </symbol>
    </svg>
    <aside class="collapse show collapse-horizontal col-sm-2 p-3 border-end bg-body-tertiary" id="collapseWidthExample">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <!-- Thay biểu tượng Bootstrap bằng icon Font Awesome -->
            <i class="fas fa-book pe-none me-2" style="font-size: 40px;"></i>
            <span class="d-print-block">LIBRARY MANAGEMENT</span>
        </a>

        <hr>

        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="#" class="nav-link link-body-emphasis">
                    <p class="d-flex align-items-center" style="position:fixed;">
                        <i class="bi bi-house-door" style="font-size: 20px;"></i>
                        <span class="ms-2">Home</span>
                    </p><br>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-body-emphasis">
                    <p class="d-flex align-items-center" style="position:fixed;">
                        <i class="bi bi-book" style="font-size: 20px;"></i>
                        <span class="ms-2">Book</span>
                    </p><br>
                </a>
            </li>

            <li>
                <a href="{{ route('reader.index') }}" class="nav-link link-body-emphasis">
                    <p class="d-flex align-items-center" style="position:fixed;">
                        <i class="bi bi-people" style="font-size: 20px;"></i>
                        <span class="ms-2">Reader</span>
                    </p><br>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-body-emphasis">
                    <p class="d-flex align-items-center" style="position:fixed;">
                        <i class="bi bi-border-width" style="font-size: 20px;"></i>
                        <span class="ms-2">Borrow Book</span>
                    </p><br>
                </a>
            </li>
            <div class="dropdown fixed-bottom-end">
                <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="true">
                    <img src="https://avatars.githubusercontent.com/u/162896131?v=4&size=64" alt="" width="32" height="32" class="rounded-circle me-2">
                    <span class="d-print-block"><strong>Quang Hiếu</strong></span>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
            </div>
    </aside>
    <main class="col-sm-10 bg-body-tertiary" id="main">
        <div class="container-fluid">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" id="title">
                <h1 class="h2">@yield('title', 'Dashboard')</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                        <i class="bi bi-calendar3"></i>
                        This week
                    </button>
                </div>
            </div>
            @yield('content')
        </div>
    </main>
    <!-- Footer -->
    <footer class="footer_area section_padding_130_0 mt-4" style="margin-left: 280px;">
        <div class="container">
            <div class="row">
                <!-- Single Widget-->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer-widget section_padding_0_130">
                        <!-- Footer Logo-->
                        <div class="footer-logo mb-3"></div>
                        <p>Bản quyền này thuộc về nhóm Đỉnh Count CNW.</p>
                    </div>
                </div>
                <!-- Single Widget-->
                <div class="col-12 col-sm-6 col-lg">
                    <div class="single-footer-widget section_padding_0_130">
                        <!-- Widget Title-->
                        <h5 class="widget-title">Thành viên nhóm</h5>
                        <!-- Footer Menu-->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Nguyễn Quang Hiếu</a></li>
                                <li><a href="#">Lương Thị Thùy Liên</a></li>
                                <li><a href="#">Đỗ Thị Hiền Lương</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget-->
                <div class="col-12 col-sm-6 col-lg">
                    <div class="single-footer-widget section_padding_0_130">
                        <!-- Widget Title-->
                        <h5 class="widget-title">Được hướng dẫn</h5>
                        <!-- Footer Menu-->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Kiều Tuấn Dũng</a></li>
                                <li><a href="#">Tạ Chí Hiếu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget-->
                <div class="col-12 col-sm-6 col-lg">
                    <div class="single-footer-widget section_padding_0_130">
                        <!-- Widget Title-->
                        <h5 class="widget-title">Contact</h5>
                        <!-- Footer Menu-->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">64KTPM3</a></li>
                                <li><a href="#">Thuy Loi University</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Script de bootstap 5.2.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    <!-- ChartsJS -->
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp"
        crossorigin="anonymous"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="dashboard.js"></script>
    <script>
        new Chartist.Line('#traffic-chart', {
            labels: ['January', 'Februrary', 'March', 'April', 'May', 'June'],
            series: [
                [23000, 25000, 19000, 34000, 56000, 64000]
            ]
        }, {
            low: 0,
            showArea: true
        });
    </script>

    <script>
        function changeclass() {
            $("#main").toggleClass('col-sm-10 col-sm-12');
        }
    </script>
</body>

</html>