<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SeoulHairArt')</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-white-50">

    <!-- 헤더 포함 -->
    @include('partials.header')

    <!-- 메인 콘텐츠 -->
    <main class="pt-20 md:pt-24">
        @yield('content')
    </main>

    <!-- 푸터 포함 -->
    @include('partials.footer')

    <!-- Optional: Tailwind JS 및 Alpine.js 스크립트 추가 -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>

</body>
</html>
