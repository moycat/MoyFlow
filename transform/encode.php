<?php

$query = $argv[1];

$encoded = [
    'Base64' => base64_encode($query),
    'URL Encoding' => rawurlencode($query)
];

$items = [];

foreach ($encoded as $type => $value) {
    $items[] = [
        'title' => $value,
        'subtitle' => $type,
        'arg' => $value,
        'text' => [
            'copy' => $value,
            'largetype' => $value
        ]
    ];
}

echo json_encode(['items' => $items]);
