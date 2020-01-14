<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Dtlcourseopt;

/**
 * DtlcourseoptSearch represents the model behind the search form of `frontend\models\Dtlcourseopt`.
 */
class DtlcourseoptSearch extends Dtlcourseopt
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddtlcourse', 'courseID', 'optID', 'iscorrect', 'urutan'], 'integer'],
            [['optional'], 'safe'],
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
        $query = Dtlcourseopt::find();

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
            'iddtlcourse' => $this->iddtlcourse,
            'courseID' => $this->courseID,
            'optID' => $this->optID,
            'iscorrect' => $this->iscorrect,
            'urutan' => $this->urutan,
        ]);

        $query->andFilterWhere(['like', 'optional', $this->optional]);

        return $dataProvider;
    }
}
