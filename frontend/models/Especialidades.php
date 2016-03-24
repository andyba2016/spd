<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "especialidades".
 *
 * @property string $especialidad
 * @property string $nombre
 *
 * @property Materias[] $materias
 */
class Especialidades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'especialidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['especialidad'], 'required'],
            [['especialidad'], 'string', 'max' => 5],
            [['nombre'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'especialidad' => 'Especialidad',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterias()
    {
        return $this->hasMany(Materias::className(), ['especialidad' => 'especialidad']);
    }
}
