<?php
use yii\bootstrap\Html;
use yii\grid\GridView;
$this->title='การสร้างบทความ';
?>

<div class="page-header">
    <h1><?=$this->title?></h1>
</div>

<?=GridView::widget([
    'dataProvider'=>$data,
    'tableOptions'=>[
      'class'=>'table table-hover',  
    ],
    'layout'=>"{items}\n{pager}", //เอา Summary ออก
    'columns'=>[
        'id',
        'title',
        'content',
        ['class'=>'yii\grid\ActionColumn']
    ],
]);
?>
<?=Html::a('สร้างบทความ','create',['class'=>'btn btn-primary'])?>