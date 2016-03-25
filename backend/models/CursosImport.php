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
 * @property boolean $isActive
 *
 * @property Planta[] $plantas
 */


use yii\base\Model;
use yii\web\UploadedFile;


class CursosImport extends Model
{


  public $file;




   public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('/tmp/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }



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
/*    public function rules()
    {
        return [
            [['dni', 'nombre', 'legajo', 'fecha_nacimiento'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['isActive'], 'boolean'],
            [['dni'], 'string', 'max' => 11],
            [['nombre'], 'string', 'max' => 50],
            [['legajo'], 'string', 'max' => 10],
            [['legajo'], 'unique']
        ];
    }
*/
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dni' => 'Dni',
            'nombre' => 'Nombre',
            'legajo' => 'Legajo',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'isActive' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlantas()
    {
        return $this->hasMany(Planta::className(), ['dni' => 'dni']);
    }
}



