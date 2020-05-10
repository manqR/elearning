<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dtlcourseopt".
 *
 * @property int $iddtlcourse
 * @property int $courseID
 * @property int $optID
 * @property string $optional
 * @property int $iscorrect
 * @property int $urutan
 *
 * @property Dtlcourse[] $dtlcourses
 * @property Course $course
 * @property Dtlcourse $iddtlcourse0
 * @property Tbloption $opt
 * @property Resultcourse[] $resultcourses
 */
class Dtlcourseopt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dtlcourseopt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddtlcourse', 'courseID', 'optID', 'optional', 'iscorrect'], 'required'],
            [['iddtlcourse', 'courseID', 'optID', 'iscorrect'], 'integer'],
            [['optional'], 'string', 'max' => 1000],
            [['courseID'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['courseID' => 'courseID']],
            [['iddtlcourse'], 'exist', 'skipOnError' => true, 'targetClass' => Dtlcourse::className(), 'targetAttribute' => ['iddtlcourse' => 'iddetailcourse']],
            [['optID'], 'exist', 'skipOnError' => true, 'targetClass' => Tbloption::className(), 'targetAttribute' => ['optID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddtlcourse' => 'Iddtlcourse',
            'courseID' => 'Course ID',
            'optID' => 'Opt ID',
            'optional' => 'Optional',
            'iscorrect' => 'Iscorrect',
            'urutan' => 'Urutan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDtlcourses()
    {
        return $this->hasMany(Dtlcourse::className(), ['correctAnswer' => 'urutan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['courseID' => 'courseID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddtlcourse0()
    {
        return $this->hasOne(Dtlcourse::className(), ['iddetailcourse' => 'iddtlcourse']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOpt()
    {
        return $this->hasOne(Tbloption::className(), ['id' => 'optID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultcourses()
    {
        return $this->hasMany(Resultcourse::className(), ['answer' => 'urutan']);
    }
}
