<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>
    <?php // $form->field($model, 'type_id')->textInput() ?>
    <?php // $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>
    <?=$form->field($model,'file')->fileInput()?>
    <?=$form->field($model,'type_id')->dropDownList($model->getTypeList())?>

   <?php if($model->photo): ?>
            <?=Html::img(Url::to(Yii::$app->request->BaseUrl.'/'.$model->photo),
            ['class'=>'thumbnail']) ?>
    
            <!--DELETE BUTTON--------!>
            <?=Html::a('<i class="glyphicon glyphicon-trash"></i>',
            ['delimage','id'=>$model->id,'field'=>'photo'],       //เรียกฟังชั่น delimage และส่งค่า id และ field = photo ไปด้วย
            ['class'=>'btn btn-danger'])?>
    <?php endif; ?>
            
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
