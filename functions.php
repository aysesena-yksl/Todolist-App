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
function greeting($time_of_day){
    $greetings = [
        'morning '=> 'Haydi kalk ve bir kahve iç',
        'afternoon' => 'Biraz yürüyüş ?',
        'night' => 'Çok geç oldu, dinlenmelisin'
    ];

    $greeting_key = strtolower($time_of_day);

    return $greetings[$greeting_key];

}
function redirect($url)
{
    header('Location: ' . $url);
    exit();
}
function is_json($string){
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);

}
function get_todos(){
    $data_content = file_get_contents(__DIR__.'/data.json');
    if(is_json($data_content)) {
        return json_decode($data_content);
    }
    return [];
}
function set_todos($todos){
    $data_content = json_encode($todos);
    file_put_contents(__DIR__.'/data.json', $data_content);

}/*
function update_todo($todo_index){
    $todos = get_todos();
    if($todos['todo_index'] = !$todos['todo_index']){
        file_put_contents('todo.json', json_encode($todos, JSON_PRETTY_PRINT));

    }else{
        set_todos();
    }
}
/*
function delete_todo($todo_index){
    $todos = get_todos();
    if(!isset($todos[$todo_index])) {
        return;
    }

    unset($todos[$todo_index]);
    $todos = array_values($todos);
    set_todos($todos);


}*/
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