<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estados".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property Planta[] $plantas
 */
class Estados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 30]
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
        return $this->hasMany(Planta::className(), ['id_estado' => 'id']);
    }
}
