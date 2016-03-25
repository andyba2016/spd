<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "resoluciones".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property Planta[] $plantas
 */
class Resoluciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resoluciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlantas()
    {
        return $this->hasMany(Planta::className(), ['id_resolucion' => 'id']);
    }
}
