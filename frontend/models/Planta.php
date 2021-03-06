<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "planta".
 *
 * @property integer $id_curso
 * @property integer $id_categoria
 * @property integer $id
 * @property boolean $isActive
 * @property integer $id_dedicacion
 * @property string $codigo_especialidad
 * @property string $dni
 * @property double $cantidad_dedicaciones
 * @property double $cantidad_horas
 * @property integer $id_revista
 *
 * @property Categorias $idCategoria
 * @property Cursos $idCurso
 * @property Dedicaciones $idDedicacion
 * @property Docentes $dni0
 * @property Especialidades $codigoEspecialidad
 * @property Revista $idRevista
 */
class Planta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'planta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_curso', 'id_categoria', 'id_dedicacion', 'id_revista','numero_resolucion','id_resolucion','id_estado'], 'integer'],
            [['cantidad_dedicaciones', 'cantidad_horas'], 'number'],
            [['codigo_especialidad'], 'string', 'max' => 5],
            [['dni'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Id Curso',
            'id_categoria' => 'Id Categoria',
            'id' => 'ID',
            'id_dedicacion' => 'Id Dedicacion',
            'codigo_especialidad' => 'Codigo Especialidad',
            'dni' => 'CUIT',
            'cantidad_dedicaciones' => 'Cantidad Dedicaciones',
            'cantidad_horas' => 'Cantidad Horas',
            'id_revista' => 'Id Revista',
            'id_resolucion' => 'Tipo de resolucion',
            'numero_resolucion' => 'Codigo Resolucion',
            'id_estado'=>'Estado'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategoria()
    {
        return $this->hasOne(Categorias::className(), ['id' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCurso()
    {
        return $this->hasOne(Cursos::className(), ['id' => 'id_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDedicacion()
    {
        return $this->hasOne(Dedicaciones::className(), ['id' => 'id_dedicacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDni0()
    {
        return $this->hasOne(Docentes::className(), ['dni' => 'dni']);
    }


    public function getEstado0()
    {
        return $this->hasOne(Estados::className(), ['id' => 'id_estado']);
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
    public function getIdRevista()
    {
        return $this->hasOne(Revista::className(), ['id' => 'id_revista']);
    }

    public function getCodigo($data){

//	$userModel = User::findOne(Yii::$app->user->getIdentity()->id);

	 $valor = Cursos::find()->where(['id' => $data->id_curso])->one();
	 $materia = Materias::find()->where(['id' => $valor->id_materia])->one();

	 


	 return "<b>Materia:</b>&nbsp;".$materia->nombre."<br><b>A&ntilde;o Ac:</b>&nbsp;".$valor->anio_academico."<br><b>A&ntilde;o:&nbsp;</b>".$valor->anio."<br> <b>Comision:&nbsp;</b>".$valor->comision."<br><b>Cantidad de alumnos:</b>&nbsp;".$valor->cantidad_alumnos;
    
      }
    
    public function getEstado($data)
    {
        $valor = Estados::find()->where(['id' => $data->id_estado])->one();
        $color="badge bg-green";
        if($data->id_estado==0){
            $color="badge bg-green";
        }
        if($data->id_estado==1){
            $color="badge bg-red";
        }
        if($data->id_estado==2){
            $color="badge bg-yellow";
        }
        return '<span class="'.$color.'">'.$valor->nombre.'</span>';
    }

    public function getIdResolucion()
    {
        return $this->hasOne(Resoluciones::className(), ['id' => 'id_resolucion']);
    }

        public function getDedicacion($data){
         if(isset( $data->id_revista)){   
	 $valor = Revista::find()->where(['id' => $data->id_revista])->one();
         $revista = $valor->revista;
         }else{
         $revista = "No indicado";
         }
         
         if(isset( $data->id_resolucion)){  
         $valor = Resoluciones::find()->where(['id' => $data->id_resolucion])->one();
         $tipo_resolucion = $valor->nombre;
         }else{
         $tipo_resolucion = "No indicado";
         }
        return "<b>Cantidad de dedicaciones:</b>&nbsp;".$data->cantidad_dedicaciones."<br><b>Cantidad de horas:</b>&nbsp;".$data->cantidad_horas."<br><b>A&ntilde;o Ac:</b>&nbsp;".$revista."<br><b>Resolucion:</b>&nbsp;".$data->numero_resolucion."<br><b>Tipo de resolucion:</b>&nbsp;".$tipo_resolucion;
    }
}
