<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Dtlcoursecategory;

/**
 * DtlcoursecategorySearch represents the model behind the search form of `frontend\models\Dtlcoursecategory`.
 */
class DtlcoursecategorySearch extends Dtlcoursecategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detailID'], 'integer'],
            [['dtlCatCourseName'], 'safe'],
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
        $query = Dtlcoursecategory::find();

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
            'detailID' => $this->detailID,
        ]);

        $query->andFilterWhere(['like', 'dtlCatCourseName', $this->dtlCatCourseName]);

        return $dataProvider;
    }
}
