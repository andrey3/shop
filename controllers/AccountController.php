<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 12.08.15
 * Time: 14:31
 */

namespace app\controllers;


use Yii;
use app\models\LoginForm;
use app\models\User;

class AccountController extends \yii\web\Controller {

    public function actionIndex() {

        $user = Yii::$app->user->getIdentity();
        return $this->render('account', ['user'=>$user]);

    }

}