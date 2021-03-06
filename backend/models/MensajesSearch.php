<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Mensajes;

/**
 * MensajesSearch represents the model behind the search form about `backend\models\Mensajes`.
 */
class MensajesSearch extends Mensajes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sender', 'recipient'], 'integer'],
            [['content', 'title', 'fecha_envio', 'estado'], 'safe'],
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
        $query = Mensajes::find();

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
            'id' => $this->id,
            'fecha_envio' => $this->fecha_envio,
        ]);

        $query->orFilterWhere([
            'sender' => Yii::$app->user->getIdentity()->id,
	]);

        $query->orFilterWhere([
            'recipient' => Yii::$app->user->getIdentity()->id,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'estado', $this->estado]);



        return $dataProvider;
    }
}
