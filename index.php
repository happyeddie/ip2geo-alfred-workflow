<?php
$query  = $argv[1];
$items  = [];

$result = json_decode(
    file_get_contents("https://api.zhoufan.net/geoip/{$query}")
, true);

if(isset($result['country'])) {
    $items[]    = [
        "title" => "{$result['country']}",
        "arg"   => "{$result['country']}",
        "subtitle" => "Country",
    ];
}

if(isset($result['city'])) {
    $items[]    = [
        "title" => "{$result['city']}",
        "arg"   => "{$result['city']}",
        "subtitle" => "City",
    ];
}

if(isset($result['latitude'])) {
    $items[]    = [
        "title" => "{$result['latitude']},{$result['longitude']}",
        "arg"   => "{$result['latitude']},{$result['longitude']}",
        "subtitle" => "Latlng",
        "quicklookurl" => "https://www.google.com/maps/search/{$result['latitude']},{$result['longitude']}"
    ];
}

if(isset($result['timezone'])) {
    $items[]    = [
        "title" => "{$result['timezone']}",
        "arg"   => "{$result['timezone']}",
        "subtitle" => "Timezone",
    ];
}

if(isset($result['asnOrganization'])) {
    $items[]    = [
        "title" => "{$result['asnOrganization']}",
        "arg"   => "{$result['asnOrganization']}",
        "subtitle" => "Organization",
    ];
}

$output = [
    "items" => $items
];

echo json_encode($output);
?>