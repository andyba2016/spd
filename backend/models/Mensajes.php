<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mensajes".
 *
 * @property integer $id
 * @property integer $sender
 * @property integer $recipient
 * @property string $content
 * @property boolean $isActive
 * @property string $title
 * @property string $fecha_envio
 * @property string $estado
 *
 * @property User $sender0
 * @property User $recipient0
 */
class Mensajes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mensajes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sender', 'recipient'], 'integer'],
            [['content'], 'string'],
            [['isActive'], 'boolean'],
            [['fecha_envio'], 'safe'],
            [['title', 'estado'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sender' => 'Sender',
            'recipient' => 'Recipient',
            'content' => 'Content',
            'isActive' => 'Is Active',
            'title' => 'Title',
            'fecha_envio' => 'Fecha Envio',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSender0()
    {
        return $this->hasOne(User::className(), ['id' => 'sender']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipient0()
    {
        return $this->hasOne(User::className(), ['id' => 'recipient']);
    }
}
