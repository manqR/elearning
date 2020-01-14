<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $courseID
 * @property int $categoryID
 * @property string $title
 * @property string $description
 * @property string|null $img
 * @property string|null $materi
 * @property string $author
 * @property string $create_date
 *
 * @property Coursecategory $category
 * @property Dtlcourse[] $dtlcourses
 * @property Dtlcourseopt[] $dtlcourseopts
 * @property Usercourse[] $usercourses
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoryID', 'title', 'description', 'author', 'create_date'], 'required'],
            [['categoryID'], 'integer'],
            [['description'], 'string'],
            [['create_date'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['img', 'materi', 'author'], 'string', 'max' => 50],
            [['categoryID'], 'exist', 'skipOnError' => true, 'targetClass' => Coursecategory::className(), 'targetAttribute' => ['categoryID' => 'categoryID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'courseID' => 'Course ID',
            'categoryID' => 'Category ID',
            'title' => 'Title',
            'description' => 'Description',
            'img' => 'Img',
            'materi' => 'Materi',
            'author' => 'Author',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Coursecategory::className(), ['categoryID' => 'categoryID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDtlcourses()
    {
        return $this->hasMany(Dtlcourse::className(), ['courseID' => 'courseID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDtlcourseopts()
    {
        return $this->hasMany(Dtlcourseopt::className(), ['courseID' => 'courseID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsercourses()
    {
        return $this->hasMany(Usercourse::className(), ['courseID' => 'courseID']);
    }
}
