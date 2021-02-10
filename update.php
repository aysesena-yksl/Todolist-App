<?php
require_once __DIR__.'/functions.php';

$json = file_get_contents('data.json');
$jsonArray = json_decode($json,true);

$todos = $_POST['todo_index'];

$jsonArray[$todos]['completed'] = !$jsonArray[$todos]['completed'];

file_put_contents('data.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

redirect('/untitled1/index.php');
