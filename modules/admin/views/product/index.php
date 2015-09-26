<?php
/* @var $this yii\web\View */
/* @var $products array */

use yii\helpers\Url;
?>
    <h1>Products</h1>
<?php
    if(Yii::$app->session->hasFlash('delete_error')){
        echo Yii::$app->session->getFlash('delete_error');
    }
?>
<?php if(isset($products) && !empty($products)): ?>

    <table class="table table-striped">
        <thead>
            <th>id</th>
            <th>image</th>
            <th>title</th>
            <th>description</th>
            <th>price</th>
            <th></th>
            <th></th>
        </thead>

        <?php foreach($products as $product): ?>
            <tbody>
                <td><?=$product->id;?></td>
                <td><?=$product->image;?></td>
                <td><?=$product->title;?></td>
                <td><?=$product->description;?></td>
                <td><?=$product->price;?></td>
                <td><a href="<?= Url::toRoute("/admin/product/edit/$product->id") ?>">Edit</a></td>
                <td><a href="<?= Url::toRoute("/admin/product/delete/$product->id") ?>">Delete</a></td>
            </tbody>
        <?php endforeach;?>

    </table>

<?php else: ?>
    <p>Sorry, we don't have products</p>
<?php endif; ?>