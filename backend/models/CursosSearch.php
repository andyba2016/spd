<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cursos;

/**
 * CursosSearch represents the model behind the search form about `app\models\Cursos`.
 */
class CursosSearch extends Cursos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_materia', 'anio', 'anio_academico', 'cantidad_alumnos', 'id'], 'integer'],
            [['comision', 'codigo_especialidad'], 'safe'],
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
        $query = Cursos::find();

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
            'id_materia' => $this->id_materia,
            'anio' => $this->anio,
            'anio_academico' => $this->anio_academico,
            'cantidad_alumnos' => $this->cantidad_alumnos,
            'id' => $this->id,
        ]);


	// $query->Where(['in', 'id_curso', [9, 12, 13]]);


        $query->andFilterWhere(['like', 'comision', $this->comision])
            ->andFilterWhere(['like', 'codigo_especialidad', $this->codigo_especialidad]);

	



        return $dataProvider;
    }
}
