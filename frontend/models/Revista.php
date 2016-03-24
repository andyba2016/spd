<?php

namespace frontend\models;
use Yii;

/**
 * This is the model class for table "revista".
 *
 * @property integer $id
 * @property string $revista
 */
class Revista extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'revista';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['revista'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'revista' => 'Revista',
        ];
    }
}
