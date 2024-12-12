<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>DevShop</title>
    <meta name="description" content="Видеокурс по изучению принципов программирования">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
    <link rel="mask-icon" href="../images/safari-pinned-tab.svg" color="#1E1F43">
    <meta name="msapplication-TileColor" content="#1E1F43">
    <meta name="theme-color" content="#1E1F43">

    @vite(['resources/css/app.css', 'resources/sass/main.sass', 'resources/js/app.js'])
    @yield('styles')

</head>
<body x-data="{ 'showTaskUploadModal': false, 'showTaskEditModal': false }" x-cloak>
@include('_parts.header')

<main class="md:min-h-screen md:flex md:items-center md:justify-center py-16 lg:py-20">
    <div class="container">
        @include('_parts.flash')
        <main class="py-16 lg:py-20">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</main>

@include('_parts.footer')


</body>
</html>
