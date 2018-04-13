<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\News;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class NewsController  extends Controller{
    
    //Index--------------------
    public function actionIndex(){
        $query=News::find();
        $data=new ActiveDataProvider([
            'query'=>$query,
        ]);
        
        return $this->render('index',['data'=>$data]);
    }
    
    //Create-------------------
    public function actionCreate(){
        $model=new News();
        
        $postData=\Yii::$app->request->post();
        
        if($model->load($postData) && $model->save()){
            return $this->redirect(['view','id'=>$model->id]);                        //เมื่อบันทึกสำเร็จ
        }else{
            return $this->render('create',['model'=>$model]);                         //เมื่อคลิกเพื่อ Create
        }
    }
    
    //Update-------------------
    public function actionUpdate($id){
        $model=$this->findModel($id);
        
        $postData=\Yii::$app->request->post();
        
        if($model->load($postData) && $model->save()){
            return $this->redirect(['view','id'=>$model->id]);                        //เมื่อบันทึกสำเร็จ
        }else{
            return $this->render('update',['model'=>$model]);                         //เมื่อคลิกที่เพื่อแก้ไข
        }
    }
    
    //View----------------------
    public function actionView($id){
        return $this->render('view',[
            'model'=>$this->findModel($id)
        ]);
    }
    
    //Delete----------------------
    public function actionDelete($id){
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    
    //ตรวจสอบ $id ว่ามีข้อมูลในฐานข้อมูลหรือไม่ หากไม่จะแจ้งเตื่องตามที่เรากำหนด-----------
    protected function findModel($id){
        if(($model=News::findOne($id)) !==null){
            return $model;
        }else{
            throw new NotFoundHttpException('ไม่มี id นี้ในฐานข้อมูล'); //หากเราใส่ id ที่ไม่มีในฐานข้อมูลระบบก็จะแจ้งเตือน
        }
    }
}