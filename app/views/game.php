<head>
    <?php include('head.php') ?>
</head>

<body>
    <div class="content">
        <div class="container">
            <?php include('navbar.php') ?>
           
            <div class="breadcrumbs">
                <ul class="breadcrumbs-wrap">
                    <li class="breadcrumbs-item">
                        <a href="<?= ROOT ?>home" class="breadcrumbs-link">Главная</a>
                    </li>
                    <li class="breadcrumbs-item">
                        <a href="#" class="breadcrumbs-link"><?= htmlspecialchars($data['game']->title) ?></a>
                    </li>
                </ul>
            </div>
            <div class="single-wrap">
                <div class="single-game">
                    <div class="single-game__left">
                        <div class="single-img">
                            <img src="<?= ROOT . $data['game']->preview ?>" alt="">
                        </div>
                    </div>
                    <div class="single-game__middle">
                        <div class="single-game__top">
                            <div class="single-game__menu">
                                <div class="single-game__menu-item act" data-game-menu-id="1">Информация об игре</div>
                                <div class="single-game__menu-item" data-game-menu-id="2">Другие части</div>
                                <div class="single-game__menu-item" data-game-menu-id="3">Похожие игры</div>
                            </div>
                        </div>
                        <div class="single-game__main">
                            <div class="single-game__main-wrap act" data-game-wrap-id="1">
                                <h1 class="single-title"><?= htmlspecialchars($data['game']->title) ?></h1>
                                <div class="single-game__inner">
                                    <h2 class="single-game__title">Описание игры</h2>
                                    <div class="single-game__desc"><?= htmlspecialchars($data['game']->body) ?></div>
                                </div>
                            </div>
                            <div class="single-game__main-wrap" data-game-wrap-id="2"></div>
                            <div class="single-game__main-wrap" data-game-wrap-id="3"></div>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar-wrap">
                            <div class="sidebar-header">Теги</div>
                            <div class="sidebar-tags">
                                <ul class="sidebar-tags__items">
                                    <li class="sidebar-tags__item">
                                        <a href="#" class="sidebar-tags__link">Тут тег 1</a>
                                    </li>
                                    <li class="sidebar-tags__item">
                                        <a href="#" class="sidebar-tags__link">Тут тег 2</a>
                                    </li>
                                    <li class="sidebar-tags__item">
                                        <a href="#" class="sidebar-tags__link">Тут тег 3</a>
                                    </li>
                                    <li class="sidebar-tags__item">
                                        <a href="#" class="sidebar-tags__link">Тут тег 4</a>
                                    </li>
                                    <li class="sidebar-tags__item">
                                        <a href="#" class="sidebar-tags__link">Тут тег 5</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="POST" class="<?= $data['game']->class ?>" data-game-id="<?= $data['game']->id ?>">
                    <?= isset($_SESSION['user_id']) ? '<button>' . $data['game']->name . '</button>' : null ?>
                </form>

                
                    <select class="form__game-rating" data-game-id="<?= $data['game']->id ?>">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option> 
                    </select>
                    <button class="from__send-rate">Оценить</button>

                    <div class="rating"><?=$data['rating'] ?? 'у этой игры еще нет оценок'?></div>

                <?php if (!empty($_SESSION['user_id'])) : ?>
                    <form method="POST" class="form__add_comment">
                        <textarea id="text" cols="30" rows="10"></textarea>
                        <div class="hidden game-id"><?= $data['game']->id ?></div>
                        <button class="btn__add_comment" name="add_comment">Add</button>
                    </form>
                <?php else : ?>
                    <h3>signup to leave a comment</h3>
                <?php endif; ?>
                <?php check_message() ?>
                <div class="game__comments">
                    <h3>Comments</h3>
                    <?php foreach ($data['comments'] as $row) : ?>
                        <?php if ($row->game_id == $data['game']->id) : ?>
                            <form class="comment">
                                <div class="name"><?=htmlspecialchars($row->username) ?></div>
                                <div class="text"><?=htmlspecialchars($row->text) ?></div>
                                <?php if (isset($row->is_owner)) : ?>
                                    <button class="delete_comment">DELETE COMMENT</button>
                                <?php endif; ?>
                                <div class="hidden comment-id"><?=htmlspecialchars($row->id) ?></div>
                            </form>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>
    <script src="<?= ASSETS ?>js/game.js"></script>
</body>

</html>