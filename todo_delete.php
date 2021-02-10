<?php
require_once __DIR__.'/functions.php';



if (! isset($_POST['todo_index'])) {
    redirect('/untitled1/index.php');
}

$todo_index =$_POST['todo_index'];
$todos = get_todos();

print_r($todos);

if (! isset($todos[$todo_index])) {
    redirect('/untitled1/index.php');
}
unset($todos[$todo_index]);

$todos = array_values($todos);

set_todos($todos);

redirect('/untitled1/index.php');

/*
if(!is_numeric($_POST['todo_index'])){
    redirect('/untitled1/index.php');

}
delete_todo($_POST['todo_index']); */






