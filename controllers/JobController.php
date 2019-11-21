<?php

namespace app\controllers;

use Yii;
use app\models\Job;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Category;
use yii\data\Pagination;


class JobController extends \yii\web\Controller
{

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','edit','delete'],
                'rules' => [
                    [
                        'actions' => ['create','edit','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }



    public function actionIndex()
    {
        $query = Job::find();
        $pagination = new Pagination([
            "defaultPageSize" => 20,
            "totalCount" => $query->count()
        ]);

        $jobs = $query->orderBy('create_date DESC')->
        offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index',["jobs" => $jobs,
        'pagination' => $pagination]);
    }

    public function actionDetails($id)
    {
        //Get job
        $job = Job::find()->where(['id' => $id])->one();
        $foo = "Masudd";
        return $this->render('details',["job" => $job]);
    }

    public function actionCreate()
    {
    
            $job = new job();
        
            if ($job->load(Yii::$app->request->post())) {
                if ($job->validate()) {
                   //Save
                   $job->save();
                   //Show Message
                   Yii::$app->session->setFlash('success', "Job Added!");

                   //Redirect
                    return $this->redirect('index.php?r=job');
                }
            }
        
            return $this->render('create', [
                'job' => $job,
            ]);
        
    }

    public function actionDelete($id)
    {
        //Find Job
        $job = Job::findOne($id);

        if(\Yii::$app->user->identity->id != $job->user_id){
            return $this->redirect('index.php?r=job');
        }

        //Delete Job
        $job->delete();
        //Show Message
        Yii::$app->session->setFlash('success', "Job Deleted!");
        return $this->redirect('index.php?r=job');
    }

    public function actionEdit($id)
    {
        $job = Job::findOne($id);

        //Check for owner
        if(\Yii::$app->user->identity->id != $job->user_id){
            return $this->redirect('index.php?r=job');
        }

        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {
               //Save
               $job->save();
               //Show Message
               Yii::$app->session->setFlash('success', "Job Updated!");

               //Redirect
                return $this->redirect('index.php?r=job');
            }
        }
    
        return $this->render('edit', [
            'job' => $job,
        ]);

    }

   

}
