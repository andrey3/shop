<?php
/**
 * @var $categories array
 * @var $last array
 */

?>

<h3>Categories</h3>
<div class="content">
    <ul class="sidebar_list">
        <?php foreach($categories as $category):?>
            <li><a href="http://web/index.php/product/category/<?= $category->id; ?>"><?= $category->title ?></a></li>
        <?php endforeach;?>
        <li class="last"><a href="http://web/index.php/product/category/<?= $last->id; ?>"><?= $last->title; ?></a></li>
    </ul>
</div>