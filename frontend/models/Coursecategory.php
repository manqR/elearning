<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "coursecategory".
 *
 * @property int $categoryID
 * @property string $categoryName
 * @property int $flag
 *
 * @property Course[] $courses
 */
class Coursecategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coursecategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoryName', 'flag'], 'required'],
            [['flag'], 'integer'],
            [['categoryName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'categoryID' => 'Category ID',
            'categoryName' => 'Category Name',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['categoryID' => 'categoryID']);
    }
}
