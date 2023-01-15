<?php

// Do autorizzazione al server di accettare richieste provenienti anche da progetto Vue
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

$jsonTodoList = file_get_contents("todo.json");
echo $jsonTodoList;