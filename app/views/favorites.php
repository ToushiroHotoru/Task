<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php')?>
    <title>Document</title>
</head>
<body>
<div class="content">
<?php include('navbar.php')?>
    <div class="container">
        <div class="content">
                <div class="game-list">
                    <?php if(empty($data['favorites'])):?>
                        <div>Вы еще не добавили ни одну игру</div>
                    <?php else:?>
                    <?php foreach ($data['favorites'] as $row): ?>
                        <form class="game game__delete" data-game-id="<?=$row->id?>">
                        <a href="<?=ROOT . 'game/' . $row->url_address?>"><img src=<?=$row->preview?> alt=""></a>
                        <div>
                            <a href="<?=ROOT . 'game/' . $row->url_address?>">
                                <h3 class="game__title"><?=htmlspecialchars($row->title)?></h3>
                            </a>
                            <p class="game__body"><?=htmlspecialchars($row->body)?></p>
                            <div class="game__created_at"><?=htmlspecialchars($row->created_at)?></div>
                               <button>Delete</button>
                        </div>
                    </form>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div> 

               
                <div>
                    <?php if($_GET['page'] > 1 ):?>
                        <a href="<?=$data['prev_page']?>"><input type="button" name="prev" value="<"></a>
                    <?php endif; ?>
                        <?=$data['max_page']?>
                    <?php if($_GET['page'] < $data['max_page']): ?>
                        <a href="<?=$data['next_page']?>"><input type="button" name="next" value=">"></a>
                    <?php endif; ?>
                </div>
               
        </div>
    </div>
</div>
    footer
</footer>
<script src="<?=ASSETS?>js/favorites.js"></script>
</body>
</html>
