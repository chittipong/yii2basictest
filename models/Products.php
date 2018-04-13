<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property string $photo
 * @property integer $type_id
 *
 * @property Type $type
 */
class Products extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detail'], 'string'],
            [['type_id'], 'required'],
            [['type_id'], 'integer'],
            [['name'], 'string', 'max' => 60],
            [['photo'], 'string', 'max' => 50],
            
            [['file'],'safe'],
            [['file'],'file','extensions'=>'jpg,png,gif']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'detail' => Yii::t('app', 'Detail'),
            'file' => Yii::t('app', 'Photo'),
            'type_id' => Yii::t('app', 'Type ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Types::className(), ['id' => 'type_id']);
    }

    public function getTypeList(){
        $list=  Types::find()->orderBy('id')->all();
        return ArrayHelper::map($list,'id','name');
    }
}
