<?php
$todoList = [
    [
        'text' => 'Fare la spesa',
        'completed' => true
    ],
    [
        'text' => 'Stendere il bucato',
        'completed' => true
    ],
    [
        'text' => 'Preparare la cena',
        'completed' => false
    ],
    [
        'text' => 'Acquistare nuovo portatile',
        'completed' => false
    ]
];


// trasformo in json l'array associativo:
$jsonTodoList = json_encode($todoList);

// scrivo questi dati nel file todo.json:
file_put_contents("todo.json", $jsonTodoList);
?>