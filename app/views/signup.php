<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>Signup</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <?php include('navbar.php') ?>

            <!-- <?php //check_message()
                    ?> -->
            <form method="POST">
                <label>username</label>
                <input type="text" class="inptext" name="username">
                <?php if (isset($data['errors'])) : ?>
                    <?= $data['errors']['username'] ?>
                <?php endif; ?>
                <label>Email</label>
                <input type="text" class="inptext" name="email">
                <?php if (isset($data['errors'])) : ?>
                    <?= $data['errors']['email'] ?>
                <?php endif; ?>
                <label>Password</label>
                <input type="password" class="inptext" name="password">
                <?php if (isset($data['errors'])) : ?>
                    <?= $data['errors']['password'] ?>
                <?php endif; ?>
                <input type="submit" name="submit" value="submit">
            </form>
        </div>
    </div>
    <footer class="footer">
        footer
    </footer>
</body>

</html>