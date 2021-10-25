<head>
    <?php include('head.php') ?>
</head>

<body>
    <div class="content">
        <div class="container">
            <?php include('navbar.php') ?>
            <section class="form-wrapper">
                <form method="POST" class="form-inner restore_form">
                    <div class="form-field">
                        <label class="form-label">E-mail</label>
                        <input class="inptext" type="text" class="email" name="email">
                    </div>
                    <button>Submit</button>
                    <?= $data['message'] ?? null ?>
                </form>
            </section>
        </div>
    </div>
    <footer class="footer">
        footer
    </footer>
    <script src="<?= ASSETS ?>js/restore.js"></script>
</body>

</html>