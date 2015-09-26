<?php
/* @var $user array */
use yii\helpers\Url;
?>

<h1>Account</h1>

<p>Name: <?=$user->name?></p>
<p>Email: <?=$user->email?></p>
<p>Address: <?=$user->address?></p>
<p>Phone: <?=$user->phone_number?></p>

<a href="<?= Url::toRoute('/account/edit') ?>">Edit</a>