<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "docentes".
 *
 * @property string $dni
 * @property string $nombre
 * @property string $legajo
 * @property string $fecha_nacimiento
 *
 * @property DocentesXComision[] $docentesXComisions
 */
class Docentes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docentes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dni', 'nombre', 'fecha_nacimiento'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['dni', 'legajo'], 'string', 'max' => 11],
            [['nombre'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dni' => 'Cuit',
            'nombre' => 'Nombre',
            'legajo' => 'Legajo',
            'fecha_nacimiento' => 'Fecha Nacimiento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocentesXComisions()
    {
        return $this->hasMany(DocentesXComision::className(), ['dni' => 'dni']);
    }
}
