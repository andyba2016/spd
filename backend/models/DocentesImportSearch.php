<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DocentesImport;

/**
 * DocentesImportSearch represents the model behind the search form about `app\models\DocentesImport`.
 */
class DocentesImportSearch extends DocentesImport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dni', 'nombre', 'legajo', 'fecha_nacimiento'], 'safe'],
            [['isActive'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = DocentesImport::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'isActive' => $this->isActive,
        ]);

        $query->andFilterWhere(['like', 'dni', $this->dni])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'legajo', $this->legajo]);

        return $dataProvider;
    }
}
