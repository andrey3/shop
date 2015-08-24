<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 19.08.15
 * Time: 19:20
 */

/* @var $products array */

?>


<h1>Shopping Cart</h1>
<?php if ($products):?>
    <table width="680px" cellspacing="0" cellpadding="5" id="table">
        <thead>
            <tr bgcolor="#ddd">
                <th width="220" align="left">Image </th>
                <th width="180" align="left">Description </th>
                <th width="100" align="center">Quantity </th>
                <th width="60" align="right">Price $ </th>
                <th width="60" align="right">Total $ </th>
                <th width="90"> </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product): ?>
                <tr class="tbody">
                    <td><img src="/images/products/<?=$product['image']?>" alt="" /></td>
                    <td><?=$product['description']?>></td>
                    <td align="center"><input type="text" class="quantity" value="<?=$product['quantity']?>" style="width: 20px; text-align: right" /> </td>
                    <td align="right" class="price"><?=$product['price']?></td>
                    <td align="right" class="total">0</td>
                    <td align="center"> <a href="#"><img src="/public/images/remove_x.gif" alt="remove" /><br />Remove</a> </td>
                </tr>
            <?php endforeach;?>
        </tbody>
        <tr>
            <td colspan="3" align="right"  height="30px">Have you modified your basket? Please click here to <a href="shoppingcart.html"><strong>Update</strong></a>&nbsp;&nbsp;</td>
            <td align="right" style="background:#ddd; font-weight:bold"> Total $</td>
            <td align="right" style="background:#ddd; font-weight:bold" id="total">0 </td>
            <td style="background:#ddd; font-weight:bold"> </td>
        </tr>

    </table>
    <div style="float:right; width: 215px; margin-top: 20px;">

        <p><a href="checkout.html">Proceed to checkout</a></p>
        <p><a href="javascript:history.back()">Continue shopping</a></p>

    </div>
<?php else:?>
    <p>You don't have products in shopping cart</p>
<?php endif;?>
