<?php
namespace app\models;
use yii\base\Model;

class Post extends Model{
    public $title;
    public $content;
    
    public function rules() {
        return[
            ['title','required'],
            ['content','string']
        ];
    }
    
    public function attributeLabels() {
        return [
            'title'=>'ชื่อเรื่อง',
            'content'=>'เนื้อหา'
        ];
    }
}

