<?php

/* @var $this yii\web\View */
/* @var $product array */

use yii\helpers\Url;

?>
<h1>Product Detail</h1>
            <div class="content_half float_l">
        	<img src="<?= URL::to('/images/products/'.$product->image); ?>" alt="image" />
            </div>
            <div class="content_half float_r">
                <table>
                    <tr>
                        <td width="160">Price:</td>
                        <td>$<?= $product->price?></td>
                    </tr>
                    <tr>
                        <td>Availability:</td>
                        <td>In Stock</td>
                    </tr>
                    <tr>
                        <td>Model:</td>
                        <td><?= $product->title?></td>
                    </tr>
                    <tr>
                        <td>Manufacturer:</td>
                        <td>Apple</td>
                    </tr>
                </table>
                <div class="cleaner h20"></div>

                <a href="<?= URL::toRoute('/cart/add/'.$product->id); ?>" class="addtocart"></a>

			</div>
            <div class="cleaner h30"></div>

            <h5>Product Description</h5>
            <p><?=$product->description?></p>

          <div class="cleaner h50"></div>
