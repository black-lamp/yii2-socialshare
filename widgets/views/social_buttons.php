<?php
/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @var \yii\web\View $this
 * @var array $links
 */
?>

<div class="social-networks">
    <?php foreach($links as $link): ?>
        <?= $link ?>
    <?php endforeach; ?>
</div>
