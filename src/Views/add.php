<?php
echo "Add.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Форма для книги да
</h1>
<form action="/store" method="post">
    <label for="title">Title:
        <input type="text" name="title" placeholder="title..."/>
    </label>
    <label for="author">Author:
        <input type="text" name="author" placeholder="author..."/>
    </label>
    <label for="year">Date:
        <input type="date" name="year" id="year"/>
    </label>
    <label for="genre">Genre:
        <input type="text" name="genre" placeholder="genre..."/>
    </label>
    <button type="submit">Отправить</button>
</form>
</body>
</html>
