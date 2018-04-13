<?php
namespace app\controllers;
use yii\web\Controller;

class HelloController extends Controller{
    public function actionIndex($name='Chittipong Mongpranit'){
        return $this->render('index',['name'=>$name]);
    }
}