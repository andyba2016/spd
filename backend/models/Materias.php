<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "materias".
 *
 * @property string $especialidad
 * @property string $plan
 * @property string $codigo
 * @property string $nombre
 *
 * @property ComisionesXMateria[] $comisionesXMaterias
 * @property Especialidades $especialidad0
 */
class Materias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['especialidad', 'plan', 'codigo', 'nombre'], 'required'],
            [['especialidad', 'plan', 'codigo'], 'string', 'max' => 5],
            [['nombre'], 'string', 'max' => 50],
            [['isBasicas'], 'boolean']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'especialidad' => 'Especialidad',
            'plan' => 'Plan',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
		'isBasicas' => 'Flag basicas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComisionesXMaterias()
    {
        return $this->hasMany(ComisionesXMateria::className(), ['especialidad' => 'especialidad', 'plan' => 'plan', 'codigo' => 'codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEspecialidad0()
    {
        return $this->hasOne(Especialidades::className(), ['especialidad' => 'especialidad']);
    }



}
