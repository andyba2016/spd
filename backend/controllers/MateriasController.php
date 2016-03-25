<?php

namespace backend\controllers;

use Yii;
use backend\models\Materias;
use backend\models\MateriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MateriasController implements the CRUD actions for Materias model.
 */
class MateriasController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Materias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MateriasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Materias model.
     * @param string $especialidad
     * @param string $plan
     * @param string $codigo
     * @return mixed
     */
    public function actionView($especialidad, $plan, $codigo)
    {
        return $this->render('view', [
            'model' => $this->findModel($especialidad, $plan, $codigo),
        ]);
    }

    /**
     * Creates a new Materias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Materias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'especialidad' => $model->especialidad, 'plan' => $model->plan, 'codigo' => $model->codigo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Materias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $especialidad
     * @param string $plan
     * @param string $codigo
     * @return mixed
     */
    public function actionUpdate($especialidad, $plan, $codigo)
    {
        $model = $this->findModel($especialidad, $plan, $codigo);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'especialidad' => $model->especialidad, 'plan' => $model->plan, 'codigo' => $model->codigo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Materias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $especialidad
     * @param string $plan
     * @param string $codigo
     * @return mixed
     */
    public function actionDelete($especialidad, $plan, $codigo)
    {
        $this->findModel($especialidad, $plan, $codigo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Materias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $especialidad
     * @param string $plan
     * @param string $codigo
     * @return Materias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($especialidad, $plan, $codigo)
    {
        if (($model = Materias::findOne(['especialidad' => $especialidad, 'plan' => $plan, 'codigo' => $codigo])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
