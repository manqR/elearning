<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbloption".
 *
 * @property int $id
 * @property string $alias
 *
 * @property Dtlcourseopt[] $dtlcourseopts
 */
class Tbloption extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbloption';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'alias'], 'required'],
            [['id'], 'integer'],
            [['alias'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDtlcourseopts()
    {
        return $this->hasMany(Dtlcourseopt::className(), ['optID' => 'id']);
    }
}
