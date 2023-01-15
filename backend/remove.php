<?php

// Do autorizzazione al server di accettare richieste provenienti anche da progetto Vue
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');

$index = $_GET["index"];

// leggo il contenuto del file "todo.json" e lo salvo in variabile $jsonTodoList:
$jsonTodoList = file_get_contents("todo.json");

// decodifico il contenuto di variabile $jsonTodoList da una stringa JSON in un oggetto PHP:
$todoList = json_decode($jsonTodoList);

// rimuovo task dalla lista:
array_splice($todoList, $index, 1);

$jsonTodoList = json_encode($todoList);
file_put_contents("todo.json", $jsonTodoList);