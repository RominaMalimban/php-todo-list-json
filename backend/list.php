<?php
$todoList = [
    [
        'text' => 'Fare la spesa',
        'completed ' => true
    ],
    [
        'text' => 'Stendere il bucato',
        'completed ' => true
    ],
    [
        'text' => 'Preparare la cena',
        'completed ' => false
    ],
    [
        'text' => 'Acquistare nuovo portatile',
        'completed ' => false
    ]
];

$jsonTodoList = json_encode($todoList);
file_put_contents("todo.json", $jsonTodoList);
?>