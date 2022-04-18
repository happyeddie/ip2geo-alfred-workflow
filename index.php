<?php
$query  = $argv[1];
$items  = [];

$result = unserialize(
    file_get_contents(
        'http://api.ip2geo.pl/php/?ip='.$query
    )
);

if(isset($result['country'])) {
    $items[]    = [
        "title" => "{$result['country']}",
        "subtitle" => "Country",
    ];
}

if(isset($result['city'])) {
    $items[]    = [
        "title" => "{$result['city']}",
        "subtitle" => "City",
    ];
}

if(isset($result['lat'])) {
    $items[]    = [
        "title" => "{$result['lat']},{$result['lon']}",
        "subtitle" => "Latlng",
        "quicklookurl" => "https://www.google.com/maps/search/{$result['lat']},{$result['lon']}"
    ];
}

$output = [
    "items" => $items
];

echo json_encode($output);
?>