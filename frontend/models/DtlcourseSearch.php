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
    public function rules()
    {
        return [
            [['iddetailcourse', 'courseID', 'detailID', 'correctAnswer', 'poin'], 'integer'],
            [['title', 'description', 'hint'], 'safe'],
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
            'iddetailcourse' => $this->iddetailcourse,
            'courseID' => $this->courseID,
            'detailID' => $this->detailID,
            'correctAnswer' => $this->correctAnswer,
            'poin' => $this->poin,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'hint', $this->hint]);

        return $dataProvider;
    }
}
