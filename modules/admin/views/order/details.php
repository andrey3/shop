<?php

/* @var $this yii\web\View */
/* @var $products array */

use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<h1>Order details</h1>

<table class="table table-striped">
    <thead>
    <th>prod id</th>
    <th>prod title</th>
    <th>prod image</th>
    <th>price</th>
    <th>quantity</th>
    </thead>

    <?php foreach($products as $product): ?>
        <tbody>
        <td><?=$product['product_id'];?></td>
        <td><?=$product['product_title'];?></td>
        <td><?=$product['product_image'];?></td>
        <td><?=$product['product_price'];?></td>
        <td><?=$product['product_quantity'];?></td>
        </tbody>
    <?php endforeach;?>

</table>