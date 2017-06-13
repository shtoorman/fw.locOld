
<br>
<div class="container">
    <?php if (!empty($catalog)): ?>
        <?php foreach ($catalog as $books): ?>
            <div class="panel panel-default"><?=$books['title']?><?=$books['author']?><?=$books['pubyear']?>
                <div class="panel-body">
                    <?=$books['description']?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</div>


