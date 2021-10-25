<div class="navbar">
    <a class="navbar-logo" href="<?= ROOT ?>home">Logo</a>
    <div class="navbar-user">
        <?php if (isset($_SESSION['user_name'])) : ?>
            Hello, <?= htmlspecialchars($_SESSION['user_name']) ?>
        <?php endif; ?>
    </div>
    <div class="navbar-links">
        <a class="navbar-link" href="<?= ROOT ?>home">Главная</a>

        <?php if (!isset($_SESSION['user_name'])) : ?>
            <a class="navbar-link" href="<?= ROOT ?>signup">Регистрация</a>
            <a class="navbar-link" href="<?= ROOT ?>login">Войти</a>
        <?php else : ?>
            <a class="navbar-link" href="<?= ROOT ?>favorites">Избранные</a>
            <?php if (isset($_SESSION['admin_url'])) : ?>
                <a class="navbar-link" href="<?= ROOT ?>admin">Панель админа</a>
            <?php endif; ?>
            <a class="navbar-link" href="<?= ROOT ?>logout">Выйти</a>
        <?php endif; ?>

    </div>
</div>