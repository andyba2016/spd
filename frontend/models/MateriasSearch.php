<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Materias;
use frontend\models\User;

/**
 * MateriasSearch represents the model behind the search form about `app\models\Materias`.
 */
class MateriasSearch extends Materias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['especialidad', 'plan', 'codigo', 'nombre','isBasicas'], 'safe'],
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
        $query = Materias::find();


	$userModel = User::findOne(Yii::$app->user->getIdentity()->id);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'especialidad', $this->especialidad])
            ->andFilterWhere(['like', 'plan', $this->plan])
            ->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
 ->andFilterWhere(['isBasicas'=> $userModel->isBasicas]);

        return $dataProvider;
    }
}
