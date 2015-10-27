<?php
/* @var $this yii\web\View */
/* @var $users array */

use yii\helpers\Url;
?>
<h1>Users</h1>
<?php if(Yii::$app->session->hasFlash('delete_error')){
          echo Yii::$app->session->getFlash('delete_error');
      }
?>
<?php if(isset($users) && !empty($users)): ?>
        <table class="table table-striped">
            <thead>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>address</th>
                <th>phone</th>
                <th><a href="<?= Url::toRoute("/admin/user/reg") ?>">New user</a></th>
                <th></th>
            </thead>
    <?php foreach($users as $user): ?>
            <tbody>
                <td><?=$user->id;?></td>
                <td><?=$user->name;?></td>
                <td><?=$user->email;?></td>
                <td><?=$user->address;?></td>
                <td><?=$user->phone_number;?></td>
                <td><a href="<?= Url::toRoute("/admin/user/edit/$user->id") ?>">Edit</a></td>
                <td><a href="<?= Url::toRoute("/admin/user/delete/$user->id") ?>">Delete</a></td>
            </tbody>
    <?php endforeach;?>
        </table>


<?php else: ?>
    <p>Sorry, we don't have users</p>
<?php endif; ?>