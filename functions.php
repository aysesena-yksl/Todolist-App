<?php

function time_of_day(){

    $hour = date('G');

    if($hour >= 5 and $hour <12){
        return 'Morning';
    }
    if ($hour >=12 and $hour <18){
        return  'Afternoon';
    }
    if ($hour >=18 and $hour<21){
        return 'Evening';
    }
    return  'Night';
}

function redirect($url)
{
    header('Location: ' . $url);
    exit();
}
/* function is_json($string){
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);

}  */
function get_todos(){
    $data_content = file_get_contents(__DIR__.'/data.json');
    
        return json_decode($data_content);
    
   
}
function set_todos($todos){
    $data_content = json_encode($todos);
    file_put_contents(__DIR__.'/data.json', $data_content);

}

function update($todo)
{
    $data_content = json_encode($todo);
    $todos = get_todos();
    foreach ($todos as $todo_index => $todo) {
        $todos = array_values($todos);
        set_todos($todos);
    }
}

function save_todo($todo)
{
    $todos = get_todos();
    $todos[] = $todo;
    set_todos($todos);
}
