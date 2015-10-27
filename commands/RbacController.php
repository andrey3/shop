<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{

    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $role = $auth->createRole('admin');
        $auth->add($role);

        $role = $auth->createRole('user');
        $auth->add($role);
    }
}