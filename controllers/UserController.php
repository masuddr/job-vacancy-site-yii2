<?php



namespace app\controllers;

use Yii;
use app\models\user;
use yii\web\Controller;

class UserController extends \yii\web\Controller
{
    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionRegister()
    {
        $user = new user();
    
        if ($user->load(Yii::$app->request->post())) {
            if ($user->validate()) {
                $user->save();
                   //Show Message
                   Yii::$app->session->setFlash('success', "You are now registered!");

                   //Redirect
                    return $this->redirect('index.php');
            }
        }
    
        return $this->render('register', [
            'user' => $user,
        ]);
    }

}
