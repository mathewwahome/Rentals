<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')
</head>

<body>
    @php
    $webusers = App\Models\WebUsers::count();
    $appusers = App\Models\WebUsers::count();
    $t_houses = App\Models\Houses::count();
    $t_clients = App\Models\Clients::count();
    $latestclients = App\Models\Clients::take(5)->get();
    @endphp
    @include('layout.header')
    @include('layout.aside')

    @include('dashboard.home.main')

    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>