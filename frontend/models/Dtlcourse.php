<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dtlcourse".
 *
 * @property int $iddetailcourse
 * @property int $courseID
 * @property int $detailID
 * @property string $title
 * @property string $description
 * @property int $correctAnswer
 * @property int $poin
 * @property string $hint
 *
 * @property Course $course
 * @property Dtlcoursecategory $detail
 * @property Dtlcourseopt $correctAnswer0
 * @property Dtlcourseopt[] $dtlcourseopts
 */
class Dtlcourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dtlcourse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['courseID', 'detailID', 'correctAnswer', 'poin'], 'integer'],
            [['description', 'hint'], 'required'],
            [['description', 'hint'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['courseID'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['courseID' => 'courseID']],
            [['detailID'], 'exist', 'skipOnError' => true, 'targetClass' => Dtlcoursecategory::className(), 'targetAttribute' => ['detailID' => 'detailID']],
            [['correctAnswer'], 'exist', 'skipOnError' => true, 'targetClass' => Dtlcourseopt::className(), 'targetAttribute' => ['correctAnswer' => 'urutan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddetailcourse' => 'Iddetailcourse',
            'courseID' => 'Course ID',
            'detailID' => 'Detail ID',
            'title' => 'Title',
            'description' => 'Description',
            'correctAnswer' => 'Correct Answer',
            'poin' => 'Poin',
            'hint' => 'Hint',
        ];
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
    public function getDetail()
    {
        return $this->hasOne(Dtlcoursecategory::className(), ['detailID' => 'detailID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCorrectAnswer0()
    {
        return $this->hasOne(Tbloption::className(), ['id' => 'correctAnswer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDtlcourseopts()
    {
        return $this->hasMany(Dtlcourseopt::className(), ['iddtlcourse' => 'iddetailcourse']);
    }
}
