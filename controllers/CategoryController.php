<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Category;
use yii\data\Pagination;



class CategoryController extends \yii\web\Controller
{
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        $query = Category::find();
        $pagination = new Pagination([
            "defaultPageSize" => 20,
            "totalCount" => $query->count()
        ]);

        $categories = $query->orderBy('name')->
        offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index',["categories" => $categories,
        'pagination' => $pagination]);
    }

    public function actionCreate()
    {
        
            $category = new Category();
        
            if ($category->load(Yii::$app->request->post())) {
                //Validation
                if ($category->validate()) {
                    //Save record
                    $category->save();

                    //Send message
                    Yii::$app->session->setFlash('success', "Category Added!");
                    return $this->redirect('index.php?r=category');
                }
            }
        
            return $this->render('create', [
                'category' => $category,
            ]);
        
    }

  

}
