<?php

$numbers = explode(' ', trim($argv[1]));

$query1 = $numbers[0];
if (!ctype_digit($query1) || $query1 <= 0) {
    echo json_encode([
        'items' => [
            [
                'title' => 'Bad Input',
                'subtitle' => 'Please enter a positive integer.',
                'valid' => false
            ]
        ]
    ]);
    return;
}

if (count($numbers) > 1) {
    $query2 = $numbers[1];
    if (!ctype_digit($query2) || $query2 <= $query1) {
        echo json_encode([
            'items' => [
                [
                    'title' => 'Bad Input',
                    'subtitle' => 'The 2nd integer mustn\'t be less than the first.',
                    'valid' => false
                ]
            ]
        ]);
        return;
    }

    $lower = $query1;
    $upper = $query2;
    $number = mt_rand($query1, $query2);
} else {
    $lower = 1;
    $upper = $query1;
    $number = mt_rand(1, $query1);
}

echo json_encode([
    'items' => [
        [
            'title' => "⌘-L to show or ⏎ to copy it!",
            'subtitle' => "Spoiling: it's between {$lower} and {$upper}.",
            'arg' => $number,
            'text' => [
                'copy' => $number,
                'largetype' => $number
            ],
            "variables" => [
                "lower" => $lower,
                "upper" => $upper
            ]
        ]
    ]
]);
