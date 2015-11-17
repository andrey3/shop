<?php

/* @var $this yii\web\View */
/* @var $orders array */

use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

<h1>Orders</h1>

<?php if(isset($orders) && !empty($orders)): ?>

    <table class="table table-striped" id="orders">
        <thead>
            <tr>
                <th>id</th>
                <th>user id</th>
                <th>total</th>
                <th>address</th>
                <th>phone number</th>
                <th>date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($orders as $order): ?>

                <tr>
                    <td><?=$order->id;?></td>
                    <td><?=$order->user_id;?></td>
                    <td><?=$order->total;?></td>
                    <td><?=$order->address;?></td>
                    <td><?=$order->phone_number;?></td>
                    <td><?=$order->formattedDate()?></td>
                    <td><p><a href="<?= Url::toRoute("/admin/order/details/$order->id") ?>">Details</a></p></td>
                </tr>

        <?php endforeach;?>
        </tbody>
    </table>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#orders').DataTable();
    });
</script>
<?php else: ?>
    <p>Sorry, we don't have orders</p>
<?php endif; ?>