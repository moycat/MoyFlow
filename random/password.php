<?php

$query = trim($argv[1]);
if (!ctype_digit($query) || $query <= 0) {
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

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$character_count = strlen($characters);
$alpha_num_string = '';
$ascii_string = '';

for ($i = 0; $i < $query; $i++) {
    $alpha_num_string .= $characters[mt_rand(0, $character_count - 1)];
    $ascii_string .= chr(mt_rand(33, 126));
}

echo json_encode([
    'items' => [
        [
            'title' => "AlphaNum: ⌘-L to show or ⏎ to copy it!",
            'subtitle' => "Spoiling: the length is {$query}.",
            'arg' => $alpha_num_string,
            'text' => [
                'copy' => $alpha_num_string,
                'largetype' => $alpha_num_string
            ],
            "variables" => [
                "length" => $query
            ]
        ],
        [
            'title' => "ASCII: ⌘-L to show or ⏎ to copy it!",
            'subtitle' => "Spoiling: the length is {$query}.",
            'arg' => $ascii_string,
            'text' => [
                'copy' => $ascii_string,
                'largetype' => $ascii_string
            ],
            "variables" => [
                "length" => $query
            ]
        ]
    ]
]);
