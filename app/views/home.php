<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>Document</title>
</head>

<body>
    <div class="content">
        <?php check_message() ?>
        <div class="container">
            <?php include('navbar.php') ?>
            <div class="game-wrapper">
                <div class="game-list">
                    <?php foreach ($data['games'] as $row) : ?>
                        <form class="game-item <?= $row->class ?>" data-game-id="<?= $row->id ?>">
                            <a class="game-link" href="<?= ROOT . 'game/' . $row->url_address ?>">
                                <img class="game-img" src=<?= $row->preview ?> alt="">
                            </a>
                            <div class="game-body">
                                <div class="game-row game-row-1">
                                    <a class="game-title" href="<?= ROOT . 'game/' . $row->url_address ?>"><?= htmlspecialchars($row->title) ?></a>
                                    <div class="game-created">Дата публикации: <?= date_create($row->created_at)->Format('d/m/Y') ?></div>
                                </div>
                                <div class="game-row game-row-2">
                                    <p class="game-desc"><?= htmlspecialchars($row->body) ?></p>
                                </div>

                                <?= isset($_SESSION['user_id']) ? '<button>' . htmlspecialchars($row->name) . '</button>' : null ?>
                            </div>
                        </form>

                    <?php endforeach; ?>
                </div>
                <div class="pagination">
                    <?php if ($_GET['page'] > 1) : ?>
                        <a class="pagination-link" href="<?= $data['prev_page'] ?>">
                            <label for="prev" class="pagination-btn prev">Назад</label>
                            <input type="button" name="prev" value="<" id="prev">
                        </a>
                    <?php endif; ?>

                    <?php if ($_GET['page'] < $data['max_page']) : ?>
                        <a class="pagination-link" href="<?= $data['next_page'] ?>">
                            <label for="next" class="pagination-btn next">Вперед</label>
                            <input type="button" name="next" value=">" id="next">
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>
    <script src="<?= ASSETS ?>js/home.js"></script>
</body>

</html>