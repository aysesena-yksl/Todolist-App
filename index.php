<?php
require_once __DIR__ . '/functions.php';

$name= ', Merhaba';
$time_of_day = time_of_day();
$greeting_text = greeting($time_of_day);

$data_content = file_get_contents(__DIR__.'/data.json');
$todos = json_decode($data_content);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, shrink-to-fit-no">
         <title> TO DO LIST </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="col-8 px-4 py-4 pt-md-5 pb-md-4 mx-auto">
        <h1 class="display-4 text-primary">
            <?php echo  $time_of_day; ?> <?php echo $name; ?>
        </h1>

        <div class="card">
            <div class="card-body">
                <p class="mt-2 mb-1"><strong> To Do List </strong></p> <hr>
                <?php if($todos): ?>
                  <ul>
                      <?php foreach ($todos as $todo_index => $todo ): ?>

                          <li>
                            <?php echo $todo; ?>
                              <input type="checkbox" class="btn" <?php echo $todo['completed'] ? 'checked' : ''?>>
                              <form action="todo_delete.php" method="post" style="display: -moz-inline-box">
                                <input type="hidden" name="todo_index" value="<?php echo $todo_index; ?>" />
                                <button type="submit" class="btn btn-sm btn-success">SİL</button>
                            </form>
                            <br>
                              <form action="update.php" method="post" style="display-model: ">
                                <input type="hidden" name="todo_index" value="<?php echo $todo_index; ?>" />
                                <button type="submit" class="btn btn-sm btn-success">EDİT</button>
                            </form>

                        </li>

                      <?php endforeach; ?>
                  </ul>
                <?php else: ?>
                <p> Haydi gününü planla!</p>
                <?php endif; ?>

                <form action="todo_add.php" method="post">
                    <div class="input-group">
                       <input type="text" name="todo" class="form-control" placeholder="To do.." autofocus />
                           <div class="input-group-append">
                           <button class="btn btn-outline-primary" type="submit"> EKLE </button>
                          </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

</body>
</html>