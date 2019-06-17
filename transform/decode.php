<?php

$query = $argv[1];

$decoded = [];

$base64 = base64_decode($query, true);
if ($base64 !== false && mb_check_encoding($base64, 'UTF-8')) {
    $decoded['Base64'] = $base64;
}

$decoded['URL Encoding'] = rawurldecode($query);

$items = [];

foreach ($decoded as $type => $value) {
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
