<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoリスト！</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/cupertino/jquery-ui.min.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
    <style>
    </style>
</head>
<body>
<h1>ToDoリスト！</h1>
<form action="main.php" method="get">
    <input type="text" name="what">    
    <input type="date" name="when">
    <input type="submit" value="登録する！">
    <input type="submit" name="reset" value="全てリセットする！">
</form>

<?php require "writing.php"; ?>
<span id="warning"><?= $warning ?></span>
<h2>ToDo(Limit)</h2>
<div id="all_task">
<div class="task">
    <h3>未着手</h3>
    <ol class="pre">
<?php
    foreach($all_list as $todo){?> 
        <li class="list"><?=$todo[0]?><div class="date"><?=$todo[1]?></div></li>
<?php
    }
?>
    </ol>
</div>
<div class="task">
    <h3>着手</h3>
    <ol class="pre">
        <li class="list"></li>
    </ol>
</div>
<div class="task">
    <h3>どね！</h3>
    <ol class="pre">
        <li class="list"></li>
    </ol>
</div>
</div>
<script>
$(function(){
    $('.pre').sortable({
        connectWith:".pre"
    });
    /*$('.pre').droppable({
        drop:function(event,ui){
                $(this).append('<li class="list">'+ ui.draggable[0].innerText +'</li>');
        }     
    })*/
});
</script>
</body>
</html>