<div>
    @php
    $jsonFilePath = public_path('assets/js/theme/theme.json');
    $jsonContent = file_get_contents($jsonFilePath);
    $data = json_decode($jsonContent, true);
    @endphp
    <h1>{{ $data['name'] }}</h1>
                    <!-- <img src="images/logo.png" alt="Logo"> -->

</div>