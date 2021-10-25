<head>
    <?php include('head.php')?>
</head>

<body>
    <div class="content">
        <?php include('navbar.php')?>
        <div class="container">
            <form method="POST">
                <label>login</label>
                <input type="text"  class="inptext" name="username">

                <label>Password</label>
                <input type="password"  class="inptext" name="password">

                <input type="submit" name="submit"  class="inptext" value="submit">

                <div class="form-error-message">
                    
                </div>
            </form>
            <a href="<?=ROOT?>restore">Foget your password?</a>
        </div>
    </div>
    <footer class="footer">
    footer
    </footer>
</body>

</html>