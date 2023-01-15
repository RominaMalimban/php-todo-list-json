<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

$index = $_GET["index"];

// leggo il contenuto del file "todo.json" e lo salvo in variabile $jsonTodoList:
$jsonTodoList = file_get_contents("todo.json");

// decodifico il contenuto di variabile $jsonTodoList da una stringa JSON in un oggetto PHP:
$todoList = json_decode($jsonTodoList);

// seleziono l'oggetto task corrispondente all'indice $index all'interno dell'array $todoList:
$task = $todoList[$index];

// accedo a proprietà dell'oggeto cambio il valore di "completed" del task selezionato con condizione: se true diventa false e viceversa:
if ($task->completed === true) {
    $task->completed = false;
} else {
    $task->completed = true;
}
$jsonTodoList = json_encode($todoList);
file_put_contents("todo.json", $jsonTodoList);