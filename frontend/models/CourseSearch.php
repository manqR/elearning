<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Course;

/**
 * CourseSearch represents the model behind the search form of `frontend\models\Course`.
 */
class CourseSearch extends Course
{
    /**
     * {@inheritdoc}
     */
    public $categoryName;
    // public $nama_departement;

    public function rules()
    {
        return [
            [['courseID'], 'integer'],
            [['title','categoryName', 'description', 'img', 'materi', 'author', 'create_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Course::find();
        $query->joinWith(['category']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['categoryName']=[ 
			'asc'=>['coursecategory.categoryName' => SORT_ASC],
			'desc'=>['coursecategory.categoryName'=> SORT_DESC],
        ];


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'courseID' => $this->courseID,            
            'create_date' => $this->create_date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'coursecategory.categoryName', $this->categoryName])
            ->andFilterWhere(['like', 'materi', $this->materi])
            ->andFilterWhere(['like', 'author', $this->author]);

        return $dataProvider;
    }
}
