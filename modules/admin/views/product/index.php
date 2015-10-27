<?php
/* @var $this yii\web\View */
/* @var $products array */
/* @var $pages array */

use yii\helpers\Url;
use yii\widgets\LinkPager;
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
            <th width="200 px">description</th>
            <th>price</th>
            <th>category id</th>
            <th></th>
        </thead>

        <?php foreach($products as $product): ?>
            <tbody>
                <td><?=$product->id;?></td>
                <td><img src="<?= URL::to("@web/images/products/$product->image")?>" width="66px" height="66px"></td>
                <td><?=$product->title;?></td>
                <td><?=$product->description;?></td>
                <td><?=$product->price;?></td>
                <td><?=$product->category_id;?></td>
                <td>
                    <p><a href="<?= Url::toRoute("/admin/product/edit/$product->id") ?>">Edit</a></p>
                    <p><a href="<?= Url::toRoute("/admin/product/delete/$product->id") ?>">Delete</a></p>
                </td>
            </tbody>
        <?php endforeach;?>

    </table>
    <?php
        echo LinkPager::widget([
            'pagination' => $pages,
            'registerLinkTags' => true
        ]);
    ?>

<?php else: ?>
    <p>Sorry, we don't have products</p>
<?php endif; ?>