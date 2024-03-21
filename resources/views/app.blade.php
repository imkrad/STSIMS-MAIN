<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title inertia>STSIMS</title>
        <meta name="description" content="STSIMS - DOST IX | KRAD">
        <meta name="keywords" content="DOST, SEI, STSIMS, KRAD">
        <meta name="author" content="Krad">
        <meta property="og:title" content="STSIMS - Science and Technology Scholarship Information Management System">
        <meta property="og:description" content="Scholarship Management System">
        <meta property="og:image" content="URL to the template's logo or featured image">
        <meta property="og:url" content="URL to the template's webpage">
        <meta name="twitter:card" content="summary_large_image">
        <link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico') }}">
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
