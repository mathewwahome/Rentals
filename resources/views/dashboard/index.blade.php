<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')
</head>

<body>
    @php
    $users = App\Models\WebUsers::count();
    $t_houses = App\Models\Houses::count();
    $t_clients = App\Models\Tenant::count();
    $latestclients = App\Models\Tenant::take(5)->get();
    $chartData = [
    'clients' => $t_clients,
    'houses' => $t_houses,
    'users' => $users + $users,
    ];
    @endphp
    @include('layout.header')
    @include('layout.aside')

    @include('dashboard.home.main')

    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>