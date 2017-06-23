

<div class="container">
    <?php if (!empty($catalog)): ?>
        <?php foreach ($catalog as $books): ?>
            <div class="panel panel-default"><?=$books['title']?>

                <img src="<?=$books['foto']?>" >
                <?=$books['author']?><?=$books['pubyear']?>
                <div class="panel-body">
                    <?=$books['description']?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</div>

<div class="row">
    <?php if (!empty($catalog)): ?>
    <?php foreach ($catalog as $books): ?>
    <div class="col-sm-3 col-md-2">
        <div class="thumbnail">
            <img src="<?=$books['foto']?>" >
            <div class="caption"><?=$books['title']?>
                <h3><?=$books['author']?></h3>
                <p>...</p>
                <p><a href="#" class="btn btn-primary" role="button">Купить</a> <a href="#" class="btn btn-default" role="button">Добавить в корзину</a></p>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php endif; ?>