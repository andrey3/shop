<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 12.08.15
 * Time: 14:30
 */
namespace app\controllers;

use Yii;
use app\models\LoginForm;
use app\models\RegForm;
use app\models\User;

class SignController extends \yii\web\Controller {

    public function actionReg() {

        $model = new RegForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()):

            if ($user=$model->reg()):
                if (Yii::$app->getUser()->login($user)):
                    return $this->goHome();
                endif;
            else:
                Yii::$app->session->setFlash('error', 'Error sign up.');
                Yii::error('Error sign up');
                return $this->refresh();
            endif;
        endif;

        return $this->render(
            'reg',
            ['model' => $model]
        );
    }

    public function actionLogin() {

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()):

            return $this->goBack();

        endif;

        return $this->render(
            'login',
            ['model' => $model]
        );
    }

}