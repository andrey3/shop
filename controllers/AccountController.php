<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 12.08.15
 * Time: 14:31
 */

namespace app\controllers;


use Yii;
use app\models\EditForm;

class AccountController extends \yii\web\Controller {

    public function actionIndex() {

        $user = Yii::$app->user->getIdentity();
        return $this->render('account', ['user'=>$user]);

    }

    public function actionEdit() {

        $model = new EditForm();
        $user = Yii::$app->user->getIdentity();
        if ($model->load(Yii::$app->request->post()) && $model->validate()):
            if ($model->edit($user->id)):
                $url = Yii::$app->urlManager->createUrl('account/index');
                return Yii::$app->getResponse()->redirect($url);
            else:
                Yii::$app->session->setFlash('account_error', 'Error account edit.');
                Yii::error('Error account edit');
                return $this->refresh();
            endif;
        endif;

        return $this->render(
            'edit',
            [
                'model' => $model,
                'user' => $user
            ]
        );
    }

}