<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Dtlcourse;

/**
 * DtlcourseSearch represents the model behind the search form of `frontend\models\Dtlcourse`.
 */
class DtlcourseSearch extends Dtlcourse
{
    /**
     * {@inheritdoc}
     */
    public $categoryName;
    public function rules()
    {
        return [
            [['iddetailcourse', 'courseID', 'correctAnswer', 'poin'], 'integer'],
            [['title', 'categoryName','description', 'hint'], 'safe'],
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

        $query = Dtlcourse::find();
        $query->joinWith(['detail']);
        $query->where(['courseID'=>$params['id']]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        

        $dataProvider->sort->attributes['categoryName']=[ 
			'asc'=>['dtlcoursecategory.dtlCatCourseName' => SORT_ASC],
			'desc'=>['dtlcoursecategory.dtlCatCourseName'=> SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'iddetailcourse' => $this->iddetailcourse,
            'courseID' => $this->courseID,            
            'correctAnswer' => $this->correctAnswer,
            'poin' => $this->poin,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'category.dtlCatCourseName', $this->categoryName])
            ->andFilterWhere(['like', 'hint', $this->hint]);

        return $dataProvider;
    }
}
