<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\User;
use app\models\EditForm;
use app\models\RegForm;
use Yii;
use yii\filters\AccessControl;


class UserController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'edit', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

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
        $model = $model->loadUserById($id);
        $user = User::findById($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()):
            if ($model->edit($user->id)):
                $url = Yii::$app->urlManager->createUrl('admin/user/index');
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

    public function actionReg() {

        $model = new RegForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()):

            if ($user=$model->reg()):
                $url = Yii::$app->urlManager->createUrl('admin/user/index');
                return Yii::$app->getResponse()->redirect($url);
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
}
