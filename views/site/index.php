<?php
/* @var $this yii\web\View */
/* @var $products array */
?>
<div id="slider-wrapper">
    <div id="slider" class="nivoSlider">
        <img src="/public/images/slider/02.jpg" alt="" />
        <a href="#"><img src="/public/images/slider/01.jpg" alt="" title="This is an example of a caption" /></a>
        <img src="/public/images/slider/03.jpg" alt="" />
        <img src="/public/images/slider/04.jpg" alt="" title="#htmlcaption" />
    </div>
    <div id="htmlcaption" class="nivo-html-caption">
        <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
    </div>
</div>
<h1>New Products</h1>

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