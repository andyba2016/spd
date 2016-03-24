<?php

namespace backend\controllers;

use Yii;
use backend\models\Corbi;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


class CorbiController extends Controller
{
    public function actionUploadCSV()
    {
        $model = new Corbi();

        if (Yii::$app->request->isPost) {
            $model->File = UploadedFile::getInstance($model, 'File');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }


}
