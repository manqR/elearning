<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "usercourse".
 *
 * @property int $userID
 * @property int $score
 * @property int $courseID
 * @property string $startDate
 * @property string|null $endDate
 * @property int|null $duration
 * @property int $isFinish
 * @property int $urutan
 *
 * @property Resultcourse[] $resultcourses
 * @property Course $course
 * @property User $user
 */
class Usercourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usercourse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userID', 'score', 'courseID', 'startDate', 'isFinish'], 'required'],
            [['userID', 'score', 'courseID', 'duration', 'isFinish'], 'integer'],
            [['startDate', 'endDate'], 'safe'],
            [['courseID'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['courseID' => 'courseID']],
            [['userID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userID' => 'User ID',
            'score' => 'Score',
            'courseID' => 'Course ID',
            'startDate' => 'Start Date',
            'endDate' => 'End Date',
            'duration' => 'Duration',
            'isFinish' => 'Is Finish',
            'urutan' => 'Urutan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultcourses()
    {
        return $this->hasMany(Resultcourse::className(), ['urutan' => 'urutan']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userID']);
    }
}
