<?php

$query = $argv[1];

$hashes = [
    'MD5' => hash('md5', $query),
    'SHA1' => hash('sha1', $query),
    'SHA256' => hash('sha256', $query),
    'SHA512' => hash('sha512', $query),
    'CRC32' => hash('crc32', $query)
];

$items = [];

foreach ($hashes as $type => $value) {
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
