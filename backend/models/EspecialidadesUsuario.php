<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "especialidades_usuario".
 *
 * @property integer $id
 * @property integer $id_usuario
 * @property string $id_especialidad
 *
 * @property Especialidades $idEspecialidad
 * @property User $idUsuario
 * @property boolean $isActive
 */
class EspecialidadesUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'especialidades_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario'], 'integer'],
            [['isActive'], 'boolean'],
            [['id_especialidad'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_usuario' => 'Id Usuario',
            'id_especialidad' => 'Id Especialidad',
            'isActive' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEspecialidad()
    {
        return $this->hasOne(Especialidades::className(), ['especialidad' => 'id_especialidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'id_usuario']);
    }
    
       public function getIsActive()
    {
        return $this->hasOne(User::className(), ['isActive' => 'isActive']);
    }
}
