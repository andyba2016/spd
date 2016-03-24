<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cursos".
 *
 * @property integer $id_materia
 * @property integer $anio
 * @property integer $anio_academico
 * @property string $comision
 * @property integer $cantidad_alumnos
 * @property integer $id
 * @property string $codigo_especialidad
 *
 * @property ConfiguracionCursos[] $configuracionCursos
 * @property Especialidades $codigoEspecialidad
 * @property Materias $idMateria
 */
class Cursos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cursos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_materia', 'anio', 'anio_academico', 'cantidad_alumnos'], 'integer'],
            [['comision', 'codigo_especialidad'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_materia' => 'Id Materia',
            'anio' => 'Anio',
            'anio_academico' => 'Anio Academico',
            'comision' => 'Comision',
            'cantidad_alumnos' => 'Cantidad Alumnos',
            'id' => 'ID',
            'codigo_especialidad' => 'Codigo Especialidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguracionCursos()
    {
        return $this->hasMany(ConfiguracionCursos::className(), ['id_curso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoEspecialidad()
    {
        return $this->hasOne(Especialidades::className(), ['especialidad' => 'codigo_especialidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMateria()
    {
        return $this->hasOne(Materias::className(), ['id' => 'id_materia']);
    }
    
    public function getDescription(){
        return utf8_encode(' Comisión '.$this->comision." Año Acad: ".$this->anio_academico);
    }
}
