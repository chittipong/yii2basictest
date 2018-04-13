<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @param integer $type_id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post())) {
            $model->file=UploadedFile::getInstance($model, 'file');
            
            $newName=date("Ymdhis");                                          //Generate filename by Date time
            $model->file->name=$newName.'.'.$model->file->extension;          //Change image name
            
            $upload=''; 
            
            if($model->file){
                $imgPath='uploads/products/';                   //set image path
                $model->photo=$imgPath.$model->file->name;
                $upload=1;                                   //for check status
            }
            
            if($model->save()){
                if($upload){
                    $model->file->saveAs($model->photo);
                }
                
                return $this->redirect(['view','id'=>$model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $type_id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file=UploadedFile::getInstance($model, 'file');
            $upload=''; 
            
            if($model->file){
                $imgPath='uploads/products/';                   //set image path
                $model->photo=$imgPath.$model->file->name;
                $upload=1;                                   //for check status
            }
            
            if($model->save()){
                if($upload){
                    $model->file->saveAs($model->photo);
                }
                
                return $this->redirect(['view','id'=>$model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionDelimage($id,$field){
        $img=$this->findModel($id)->$field;     //เรียกใช้ฟังชั่น findModel และดึงข้อมูลจาก photo ที่เราเก็บทั้ง path และชื่อไฟล์ไว้
        //ถ้ามีไฟล์ให้ทำการลบไฟล์ทิ้ง-------------
        if($img){
            if(!unlink($img)){
                return false;
            }
        }
        $img=$this->findModel($id);
        $img->$field=null;
        $img->update();
        return $this->redirect(['update','id'=>$id]);
    }


    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $type_id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $type_id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
