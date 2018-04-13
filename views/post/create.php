<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form=ActiveForm::begin() ?>
<?=$form->field($model,'title')->textInput()?>
<?=$form->field($model,'content')->textarea()?>

<div class="form-group">
    <?=Html::submitButton('ส่งข้อมูล',['class'=>'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>