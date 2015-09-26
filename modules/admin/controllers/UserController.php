<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\User;
use app\models\EditForm;
use Yii;


class UserController extends Controller
{
    public function actionIndex()
    {
        $users = User::getAll();
        return $this->render('index', ['users' => $users]);
    }

    public function actionDelete($id)
    {
        $result = User::deleteAll("id = $id");
        if (!$result) {
            Yii::$app->session->setFlash('delete_error', 'Error user delete.');
            Yii::error('Error user delete');
        }
        $url = Yii::$app->urlManager->createUrl('admin/user/index');
        Yii::$app->getResponse()->redirect($url);

    }
    public function actionEdit($id) {
        $model = new EditForm();
        $user = User::findById($id);

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
