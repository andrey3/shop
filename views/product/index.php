<?php
/* @var $this yii\web\View */
/* @var $products array */
/* @var $category array */
?>
<?php if (isset($category)):?>
    <h1><?= $category->title;?></h1>
<?php else:?>
    <h1>Products</h1>
<?php endif;?>

<?php if(isset($products) && !empty($products)): ?>
    <?php foreach($products as $product): ?>
        <div class="product_box">
            <h3><?=$product->title;?></h3>
            <a href="/product/view/<?=$product->id?>"><img src="/images/products/<?=$product->image;?>"/></a>
            <p><?=$product->description;?></p>
            <p class="product_price">$ <?=$product->price;?></p>
            <a href="/cart/add/<?=$product->id?>" class="addtocart"></a>
            <a href="/product/view/<?=$product->id?>" class="detail"></a>
        </div>
    <?php endforeach;?>
<?php else: ?>
    <p>Sorry, we don't have products</p>
<?php endif; ?>
