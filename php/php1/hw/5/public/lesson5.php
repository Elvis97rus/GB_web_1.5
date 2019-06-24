<div id="lightgallery">
		<?php foreach ($gallery as $image): ?>
        <div>
            <a href="singleFoto.php?name=<?=$image['name']?>">
                <img src="<?= $image['address'].$image['name'] ?>" alt="">
            </a>
            <p>Foto #<?= $image['id'] ?> | Views: <?= $image['like-number'] ?></p>
        </div>
		<?php endforeach ?>
</div>
