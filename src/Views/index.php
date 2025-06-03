<?php
/**
 * @var array $data
 */
//
?>
<?php require __DIR__ . "/./Layouts/header.php"; ?>
<body>
<div class="container">
    <h2>Список книг: </h2>
    <?php if (empty($data['books'])): ?>
        <h3>Нет книг по заданным параметрам</h3>
    <?php else: ?>
        <ul>
            <?php foreach ($data['books'] as $key => $book): ?>
                <li><span><b><?= $book['title'] ?></b> by <i><?= $book['author'] ?></i></span>
                    <a href="/delete?id=<?= $book['id'] ?>" class="delete">Удалить Книгу</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <h2><a href="/add" class="create_link">Создать запись!</a></h2>
    <section>
        <form method="GET" action="/" class="form">
            <label for="author">Автор:</label>
            <select name="author">
                <option value="">-- Все авторы --</option>
                <?php foreach ($data['authors'] as $author): ?>
                    <option value="<?= htmlspecialchars($author) ?>"><?= htmlspecialchars($author) ?></option>

                <?php endforeach; ?>
            </select>
            <label for="genre">Жанр:</label>
            <select name="genre">
                <option value="">-- Все жанры --</option>
                <?php foreach ($data['genres'] as $genre): ?>
                    <option value="<?= htmlspecialchars($genre) ?>"><?= htmlspecialchars($genre) ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Фильтровать</button>
        </form>
    </section>
</div>
</body>
<?php require __DIR__ . "/./Layouts/footer.php" ?>
