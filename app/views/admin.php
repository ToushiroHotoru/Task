<head>
    <?php include('head.php')?>
</head>

<body>
    <div class="content">
        <?php include('navbar.php')?>
        <div>
            <?php check_message()?>
            <h3>Add game</h3>
            <form method="post" enctype="multipart/form-data" name="contactForm" class="customform" method="post">
                 
                <div class="s-12"> 
                  <input name="title" class="subject" placeholder="Title" title="Title" type="text" required>
                  <p class="subject-error form-error">Please enter a title.</p>
                </div>
                <div class="s-12"> 
                  <input name="file" class="subject" type="file" required>
                  <p class="subject-error form-error">Please select a file.</p>
                </div>

                <div class="s-12">
                  <textarea name="description" class="required message" placeholder="Description" rows="3"></textarea>
                  <p class="message-error form-error">Please enter a description.</p>
                </div>
                <div><button type="submit">Submit Button</button></div>
              </form>
        </div>
        <div class="table">
          <?php forEach($data['users'] as $row): ?>
            <div>
              <?=htmlspecialchars($row->username)?> 
              <form method="POST" class="user">
                 <div class="url_address hidden"><?=$row->url_address?></div>
                 <button class="btn__admin">admin</button>
                 <!-- <button class="btn__delete">delete</button> -->
              </form>
            </div>
          <?php endforeach; ?>
        </div>
    </div>
    <footer class="footer">
      
    </footer>
    <script src="<?=ASSETS?>js/admin.js"></script>
</body>

</html>