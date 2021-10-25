<head>
    <?php include('head.php')?>
</head>

<body>
    <div class="content">
        <?php include('navbar.php')?>
        <div class="container">
            <form method="POST" class="restore_form">
                <label>password</label>
                <input type="text" class="password" name="password">
                <button>Submit</button>
                <?= $data['error'] ?? null ?>
            </form>
        </div>
    </div>
    <footer class="footer">
    footer
</footer>
    <script src="<?=ASSETS?>js/password.js"></script>
</body>

</html>