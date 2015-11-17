<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 19.08.15
 * Time: 19:20
 */

/* @var $products array */
use yii\helpers\Url;

echo $this->registerJsFile('@web/public/js/shoppingcartScript.js', ['position' => \yii\web\View::POS_END]);
?>


<h1>Shopping Cart</h1>
<?php if ($products):?>
    <form action="<?= URL::toRoute('/cart/update/');?>" method="post" name="cart">
        <table width="680px" cellspacing="0" cellpadding="5" id="table">
            <thead>
                <tr bgcolor="#ddd">
                    <th width="220" align="left">Image </th>
                    <th width="180" align="left">Description </th>
                    <th width="100" align="center">Quantity </th>
                    <th width="60" align="right">Price $ </th>
                    <th width="60" align="right">Total $ </th>
                    <th width="90"> </th>
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product): ?>
                    <tr class="tbody">
<!--                        <input type="hidden" name="Form[products][id]" value="--><?//=$product['id'] ?><!--" />-->
                        <td><img src="<?= Url::to('/images/products/'.$product['image']) ?>" alt="" /></td>
                        <td><?=$product['description']?>></td>
                        <td align="center"><input name="Form[<?=$product['id'] ?>]" type="text" class="quantity" value="<?=$product['quantity']?>" style="width: 20px; text-align: right" /> </td>
                        <td align="right" class="price"><?=$product['price']?></td>
                        <td align="right" class="total">0</td>
                        <td align="center"> <a href="<? URL::toRoute('/cart/delete/'.$product['id']);?>"><img src="<?= Url::to('/public/images/remove_x.gif');?>" alt="remove" /><br />Remove</a> </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
            <tr>
                <td colspan="3" align="right"  height="30px">Have you modified your basket? Please click here to <input type="submit" value="Update">&nbsp;&nbsp;</td>
                <td align="right" style="background:#ddd; font-weight:bold"> Total $</td>
                <td align="right" style="background:#ddd; font-weight:bold" id="total">0 </td>
                <td style="background:#ddd; font-weight:bold"> </td>
            </tr>

        </table>
    </form>
    <div style="float:right; width: 215px; margin-top: 20px;">

        <p><a href="<?= Url::toRoute('/checkout/proceed-to-checkout'); ?>">Proceed to checkout</a></p>
        <p><a href="javascript:history.back()">Continue shopping</a></p>

    </div>
<?php else:?>
    <p>You don't have products in shopping cart</p>
<?php endif;?>
