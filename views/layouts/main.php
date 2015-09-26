<!-- templatemo 367 shoes -->
<!--
Shoes Template
http://www.templatemo.com/preview/templatemo_367_shoes
-->
<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

use app\components\CategoriesWidget;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$this->registerCssFile('/public/nivo-slider.css', ['media' => 'screen']);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?= Html::csrfMetaTags() ?>
    <meta charset="<?= Yii::$app->charset ?>">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>

<body>
<?php $this->beginBody() ?>

<div id="templatemo_body_wrapper">
    <div id="templatemo_wrapper">

        <div id="templatemo_header">
            <div id="site_title"><h1><a href="#">Online Shoes Store</a></h1></div>
            <div id="header_right">
                <p>
                    <?php if (Yii::$app->user->isGuest):?>
                        <a href="<?= Url::toRoute('/sign/login') ?>">Log In</a> | <a href="<?= Url::toRoute('/sign/reg') ?>">Sign Up</a></p>
                    <?php else:?>
                        <a href="<?= Url::toRoute('/account/index/') ?>">My Account</a> | <a href="#">My Wishlist</a> | <a href="#">Checkout</a> | <a href="<?= Url::toRoute('/sign/logout') ?>">Log Out</a></p>
                    <?php endif; ?>
                <p>
                    Shopping Cart: <strong><?=count(Yii::$app->session['cart']);?> items</strong> ( <a href="<?= Url::toRoute('/cart/index') ?>">Show Cart</a> )
                </p>
            </div>
            <div class="cleaner"></div>
        </div> <!-- END of templatemo_header -->

        <div id="templatemo_menubar">
            <div id="top_nav" class="ddsmoothmenu">
                <ul>
                    <li><a href="http://web" class="selected">Home</a></li>
                    <li><a href="/product/index/">Products</a>
                        <ul>
                            <li><a href="#submenu1">Sub menu 1</a></li>
                            <li><a href="#submenu2">Sub menu 2</a></li>
                            <li><a href="#submenu3">Sub menu 3</a></li>
                            <li><a href="#submenu4">Sub menu 4</a></li>
                            <li><a href="#submenu5">Sub menu 5</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">About</a>
                        <ul>
                            <li><a href="#submenu1">Sub menu 1</a></li>
                            <li><a href="#submenu2">Sub menu 2</a></li>
                            <li><a href="#submenu3">Sub menu 3</a></li>
                        </ul>
                    </li>
                    <li><a href="faqs.html">FAQs</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
                <br style="clear: left" />
            </div> <!-- end of ddsmoothmenu -->
            <div id="templatemo_search">
                <form action="#" method="get">
                    <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                    <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
        </div> <!-- END of templatemo_menubar -->

        <div id="templatemo_main">
            <div id="sidebar" class="float_l">
                <div class="sidebar_box"><span class="bottom"></span>
                    <?= CategoriesWidget::widget(); ?>
                </div>
                <div class="sidebar_box"><span class="bottom"></span>
                    <h3>Bestsellers </h3>
                    <div class="content">
                        <div class="bs_box">
                            <a href="#"><img src="/public/images/templatemo_image_01.jpg" alt="image" /></a>
                            <h4><a href="#">Donec nunc nisl</a></h4>
                            <p class="price">$10</p>
                            <div class="cleaner"></div>
                        </div>
                        <div class="bs_box">
                            <a href="#"><img src="/public/images/templatemo_image_01.jpg" alt="image" /></a>
                            <h4><a href="#">Lorem ipsum dolor sit</a></h4>
                            <p class="price">$12</p>
                            <div class="cleaner"></div>
                        </div>
                        <div class="bs_box">
                            <a href="#"><img src="/public/images/templatemo_image_01.jpg" alt="image" /></a>
                            <h4><a href="#">Phasellus ut dui</a></h4>
                            <p class="price">$20</p>
                            <div class="cleaner"></div>
                        </div>
                        <div class="bs_box">
                            <a href="#"><img src="/public/images/templatemo_image_01.jpg" alt="image" /></a>
                            <h4><a href="#">Vestibulum ante</a></h4>
                            <p class="price">$8</p>
                            <div class="cleaner"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content" class="float_r">
                <?=$content?>
            </div>

        </div> <!-- END of templatemo_main -->

        <div id="templatemo_footer">
            <p><a href="#">Home</a> | <a href="#">Products</a> | <a href="#">About</a> | <a href="#">FAQs</a> | <a href="#">Checkout</a> | <a href="#">Contact Us</a>
            </p>

            Copyright © 2072 <a href="#">Your Company Name</a> <!-- Credit: www.templatemo.com --></div> <!-- END of templatemo_footer -->

    </div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>