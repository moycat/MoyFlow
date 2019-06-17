<?php

$query = trim($argv[1]);
$url = "http://www.ip138.com/ips138.asp?ip={$query}";

$curl = curl_init();
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0');
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

curl_close($curl);

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

$result = mb_convert_encoding($result, 'UTF-8', 'GB2312');
preg_match_all('/<ul class="ul1">(.*?)<\/ul>/', $result, $list);

if (!$list[0]) {
    echo json_encode([
        'items' => [
            [
                'title' => 'ERROR: check your input or the page is broken',
                'valid' => false
            ]
        ]
    ]);
    return;
}

preg_match_all('/<li>(.*?)<\/li>/', $list[1][0], $list);

$items = [];

foreach ($list[1] as $item) {
    $items[] = [
        'title' => $item,
        'arg' => $item,
        'text' => [
            'copy' => $item,
            'largetype' => $item
        ]
    ];
}

echo json_encode(['items' => $items]);
