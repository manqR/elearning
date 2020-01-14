<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Coursecategory;

/**
 * CoursecategorySearch represents the model behind the search form of `frontend\models\Coursecategory`.
 */
class CoursecategorySearch extends Coursecategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoryID', 'flag'], 'integer'],
            [['categoryName'], 'safe'],
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
        $query = Coursecategory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'categoryID' => $this->categoryID,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'categoryName', $this->categoryName]);

        return $dataProvider;
    }
}
