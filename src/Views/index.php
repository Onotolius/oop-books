<?php
echo "src/Views/index.php";
/**
 * @var array $data
 */
// Выше штука чтобы редактор видел что я кинул данные во вью
dump($data);
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
<h1>Привет вернул вюшку</h1>
<h2>Список книг: </h2>
<ul>
    <?php foreach ($data as $key => $book): ?>
        <li><b><?= $book['title'] ?></b> by <i><?= $book['author'] ?></i>
            <a href="/delete?id=<?= $book['id'] ?>">Delete book</a>
        </li>
    <?php endforeach; ?>
</ul>
<h2><a href="/add">Создать запись!</a></h2>
</body>
</html>
