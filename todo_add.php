<?php
require_once __DIR__ . '/functions.php';


if(empty($_POST['todo'])) {
    redirect('/untitled1/index.php');
}

$todo = htmlspecialchars(
    trim($_POST['todo'])
);

save_todo($todo);
/*
$todos = get_todos();
$todos[]=$todo;
$data_content = json_encode($todos);

file_put_contents(__DIR__.'/data.json',$data_content); */
redirect('/untitled1/index.php');
