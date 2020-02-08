<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoリスト！</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <style>
    </style>
</head>
<body>
<form action="main.php" method="get">
    <input type="text" name="what">    
    <input type="date" name="when">
    <input type="submit" name="sending" value="登録する！">
</form>
<?php require "writing.php"; ?>
<span id="warning"><?= $warning ?></span>
<h1>ToDoリスト！</h1>
<table>
    <tbody>
        <th>ToDo</th><th>Limit</th>
<?php
    foreach($all_list as $todo){?> 

        <tr><td> <?=$todo[0]; ?></td><td><?=$todo[1]; ?></td></tr>
<?php
    }
?>
<script>
</script>
</body>
</html>