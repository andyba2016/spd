<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Planta;
use frontend\models\Cursos;
use frontend\models\User;

/**
 * PlantaSearch represents the model behind the search form about `app\models\Planta`.
 */
class PlantaSearch extends Planta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_curso', 'id_categoria',  'id', 'id_dedicacion'], 'integer'],
            [['codigo_especialidad', 'dni'], 'safe'],
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


	
        $query = Planta::find();


	$userModel = User::findOne(Yii::$app->user->getIdentity()->id);

	$flag='false';
	if($userModel->isBasicas==1)
		$flag='true';
	

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
            'id_curso' => $this->id_curso,
            'id' => $this->id,
            'id_dedicacion' => $this->id_dedicacion,
        ]);


        $query->andFilterWhere(['like', 'codigo_especialidad', $this->codigo_especialidad])
            ->andFilterWhere(['like', 'dni', $this->dni]);


		$query->joinWith('idCurso' , true, 'JOIN')
			->andFilterWhere([
				'anio_academico'=>$params['anio'],
				'cursos.codigo_especialidad'=>$params['especialidad']
				])->andWhere('exists (select 1 from materias where materias.id=cursos.id_materia and materias."isActive"=true and materias."isBasicas"='.$flag.")");
    

        return $dataProvider;
    }
}
