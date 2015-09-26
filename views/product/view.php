<?php

/* @var $this yii\web\View */
/* @var $product array */


?>
<h1>Product Detail</h1>
            <div class="content_half float_l">
        	<a  rel="lightbox[portfolio]" href="images/product/10_l.jpg"><img src="/images/products/<?=$product->image?>" alt="image" /></a>
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
                    <tr>
                    	<td>Quantity</td>
                        <td><input type="text" value="1" style="width: 20px; text-align: right" /></td>
                    </tr>
                </table>
                <div class="cleaner h20"></div>

                <a href="/cart/add/<?=$product->id?>" class="addtocart"></a>

			</div>
            <div class="cleaner h30"></div>

            <h5>Product Description</h5>
            <p><?=$product->description?></p>

          <div class="cleaner h50"></div>
