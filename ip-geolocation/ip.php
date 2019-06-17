<?php

$mapping = [
    'query' => 'IP',
    'country' => 'Country',
    'regionName' => 'Region',
    'city' => 'City',
    'district' => 'District',
    'zip' => 'ZIP Code',
    'lat' => 'Latitude',
    'lon' => 'Longitude',
    'timezone' => 'Timezone',
    'isp' => 'ISP',
    'org' => 'Organization',
    'as' => 'AS Number',
    'asname' => 'AS Name',
    'reverse' => 'Reverse DNS'
];

$query = trim($argv[1]);
$api_url = "http://ip-api.com/json/{$query}?fields=4784121";

$result = json_decode(file_get_contents($api_url), true);

if (!$result) {
    echo json_encode([
        'items' => [
            [
                'title' => 'Network Error',
                'subtitle' => 'Please check your internet connection.',
                'valid' => false
            ]
        ]
    ]);
    return;
}

if ($result['status'] !== 'success') {
    echo json_encode([
        'items' => [
            [
                'title' => "ERROR: {$result['message']}",
                'valid' => false
            ]
        ]
    ]);
    return;
}

$items = [];

foreach ($mapping as $key => $value) {
    if ($result[$key]) {
        $items[] = [
            'title' => "{$value}: {$result[$key]}",
            'arg' => "{$value}: {$result[$key]}",
            'text' => [
                'copy' => $result[$key],
                'largetype' => $result[$key]
            ]
        ];
    }
}

echo json_encode(['items' => $items]);
