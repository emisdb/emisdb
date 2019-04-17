<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AcademNumber;

/**
 * AcademNumberSearch represents the model behind the search form of `frontend\models\AcademNumber`.
 */
class AcademNumberSearch extends AcademNumber
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product', 'base'], 'integer'],
            [['number', 'sum'], 'number'],
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
        $query = AcademNumber::find();

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
            'product' => $this->product,
            'base' => $this->base,
            'number' => $this->number,
            'sum' => $this->sum,
        ]);

        return $dataProvider;
    }
}
