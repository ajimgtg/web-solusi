<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Tab Icon -->
    <link rel="icon" type="image/png" href="{{ asset('img/custom/lg2.png') }}" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- My Css -->
    @yield('my-css')

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- My Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet" />

    <title>@yield('title', 'LAB INSYDE')</title>
    <style>
        .navbar {
            /* padding-top: 1rem; */
            /* Tambahkan jarak di atas */
            /* padding-bottom: 2rem; */
            /* Tambahkan jarak di bawah */
            /* background-color: #343a40; */
            /* Pastikan warna tetap solid */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Tambahkan bayangan jika diperlukan */
        }

        /* #google_translate_element {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        } */

        /* Sembunyikan tooltip Google Translate */
        /* .goog-tooltip {
            display: none !important;
        } */

        /* .goog-tooltip:hover {
            display: none !important;
        } */

        /* Sembunyikan frame banner Google Translate */
        /* .goog-te-banner-frame {
            display: none !important;
        } */

        /* Pastikan body tidak memiliki margin akibat banner */
        body {
            top: 0px !important;
        }
    </style>
</head>

<body>
    <!-- <span id="google_translate_element"></span> -->
    <div class="gtranslate_wrapper"></div>


    @include('layouts.navbar')

    @yield('content')



    @include('layouts.footer')

    <!-- Js Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    @yield('my-js')
    <script>window.gtranslateSettings = {"default_language":"id","detect_browser_language":true,"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","flag_style":"3d"}</script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

    <!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                defaultLanguage: 'id',
                pageLanguage: 'id',
                includedLanguages: 'en,id,zh-CN,es,ar,hi,pt,ru,ja,ko,fr,de,it,ms,th,tr,vi,ur,fa,nl',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false,
                multilingualPage: true,
            }, 'google_translate_element');
        };
    </script> -->

</html>
