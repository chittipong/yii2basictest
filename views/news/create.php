<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin() ?>
    <?=$form->field($model,'title')?>
    <?=$form->field($model,'content')->textarea()?>
<div class="form-group">
    <?=Html::submitButton('บันทึกขอมูล',['class'=>'btn btn-success'])?>
</div>

<?php ActiveForm::end() ?>