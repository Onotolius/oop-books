<?php require __DIR__ . "/./Layouts/header.php"; ?>
<body>
<div class="container">
    <h1>Добавить Книгу:
    </h1>
    <form action="/store" method="post">
        <label for="title">Title:
            <input type="text" name="title" placeholder="title..." required/>
        </label>
        <label for="author">Author:
            <input type="text" name="author" placeholder="author..." required/>
        </label>
        <label for="year">Date:
            <input type="date" name="year" id="year" required/>
        </label>
        <label for="genre">Genre:
            <input type="text" name="genre" placeholder="genre..." required/>
        </label>
        <button type="submit">Отправить</button>
    </form>
</div>
</body>
<?php require __DIR__ . "/./Layouts/footer.php" ?>
