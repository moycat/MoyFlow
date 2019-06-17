<?php

$query = trim($argv[1]);

if ($query === '') {
    $timestamp = (int)time();
    echo json_encode([
        'rerun' => 1,
        'items' => [
            [
                'title' => $timestamp,
                'subtitle' => date("Y-m-d G:i:s"),
                'arg' => $timestamp,
                'text' => [
                    'copy' => $timestamp,
                    'largetype' => $timestamp
                ]
            ]
        ]
    ]);
    return;
} elseif (!ctype_digit($query) || $query < 0) {
    echo json_encode([
        'items' => [
            [
                'title' => 'Bad Input',
                'subtitle' => 'Please enter a non-negative integer.',
                'valid' => false
            ]
        ]
    ]);
    return;
}

$date = date("Y-m-d G:i:s", $query);

echo json_encode([
    'items' => [
        [
            'title' => $date,
            'subtitle' => $query,
            'arg' => $date,
            'text' => [
                'copy' => $date,
                'largetype' => $date
            ]
        ]
    ]
]);
