<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dtlcoursecategory".
 *
 * @property int $detailID
 * @property string $dtlCatCourseName
 *
 * @property Dtlcourse[] $dtlcourses
 */
class Dtlcoursecategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dtlcoursecategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dtlCatCourseName'], 'required'],
            [['dtlCatCourseName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'detailID' => 'Detail ID',
            'dtlCatCourseName' => 'Dtl Cat Course Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDtlcourses()
    {
        return $this->hasMany(Dtlcourse::className(), ['detailID' => 'detailID']);
    }
}
