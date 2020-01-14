<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "resultcourse".
 *
 * @property int $id
 * @property int $urutan
 * @property int $answer
 *
 * @property Dtlcourseopt $answer0
 * @property Usercourse $urutan0
 */
class Resultcourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resultcourse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['urutan', 'answer'], 'required'],
            [['urutan', 'answer'], 'integer'],
            [['answer'], 'exist', 'skipOnError' => true, 'targetClass' => Dtlcourseopt::className(), 'targetAttribute' => ['answer' => 'urutan']],
            [['urutan'], 'exist', 'skipOnError' => true, 'targetClass' => Usercourse::className(), 'targetAttribute' => ['urutan' => 'urutan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'urutan' => 'Urutan',
            'answer' => 'Answer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswer0()
    {
        return $this->hasOne(Dtlcourseopt::className(), ['urutan' => 'answer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUrutan0()
    {
        return $this->hasOne(Usercourse::className(), ['urutan' => 'urutan']);
    }
}
