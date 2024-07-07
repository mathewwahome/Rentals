<div>
    @php
    $jsonFilePath = public_path('assets/js/theme/theme.json');
    $jsonContent = file_get_contents($jsonFilePath);
    $data = json_decode($jsonContent, true);
    @endphp
    <img src="assets/img/logo.png" alt="{{ $data['name'] }}">

</div>