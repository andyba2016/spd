<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Planta;
use frontend\models\PlantaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * PlantaController implements the CRUD actions for Planta model.
 */
class PlantaController extends Controller
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
     * Lists all Planta models.
     * @return mixed
     */
    public function actionIndex()
    {
	$params = Yii::$app->request->queryParams;




        $searchModel = new PlantaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
	    'anio' => $params['anio'],
	    'especialidad' => $params['especialidad'],
        ]);
    }
    
    public function actionSelect()
    {

        return $this->render('select');
    }
    
    public function actionAnio()
    {
        $params = Yii::$app->request->queryParams;
        return $this->render('anio', [
            'params'=>$params,
        ]);
    }
    
    public function actionDuplicate()
    {
	$params = Yii::$app->request->queryParams;



        $searchModel = new PlantaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
	    'anio' => $params['anio'],
	    'especialidad' => $params['especialidad'],'mensaje'=>'Podr&aacute; duplicar la planta anterior cuando tenga los nuevos cursos asignados'
        ]);
    }
    
    public function actionExport()
    {
//	header('Content-Type: text/html; charset=utf-8');
header("Content-type: text/csv; charset=utf-8");
header("Content-Disposition: attachment; filename=planta_docente_export.csv");
header("Pragma: no-cache");
header("Expires: 0");

        $params = Yii::$app->request->queryParams;
        $searchModel = new PlantaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setPagination(false);
        $models = $dataProvider->getModels();

 echo 'Cod. Especialidad|Plan|Cod. Materia|Nom. Materia|Año|Año académico|Comisión|Cant. Alumnos|Nombre|Categoría|Dedicación|Cant. Dedicaciones|Horas|Tipo revista|Tipo de resolución|Nro Resolución|Estado';

echo "\n";

        foreach($models as $model){
	     //echo $model->getIdCurso()->one()->getIdMateria()->one()->nombre."|";

	    $modelCurso = $model->getIdCurso()->one();
	    $modelMaterias = $modelCurso->getIdMateria()->one();

	   
	    echo $modelMaterias->especialidad."|";
	    echo $modelMaterias->plan."|";
	    echo $modelMaterias->codigo."|";
            echo utf8_decode($modelMaterias->nombre)."|";

            echo $modelCurso->anio."|";
            echo $modelCurso->anio_academico."|";
            echo $modelCurso->comision."|";
            echo $modelCurso->cantidad_alumnos."|";


echo utf8_decode($model->getDni0()->one()->nombre)."|";
             echo $model->getIdCategoria()->one()->descripcion."|";
             echo $model->getIdDedicacion()->one()->descripcion."|";
             //echo $model->codigo_especialidad."|";
             
             echo $model->cantidad_dedicaciones."|";
             echo $model->cantidad_horas."|";
		
		$modelRevista=$model->getIdRevista()->one();	
		
		if($modelRevista!="")
 			echo $modelRevista->revista."|";
		else
			echo "No informado|";
			
		$modelResolucion = $model->getIdResolucion()->one();

		if($modelResolucion!="")
 			echo $modelResolucion->nombre."|";
		else
			echo "No informado|";


            
             echo $model->numero_resolucion."|";


	echo $model->getEstado0()->one()->nombre;

	     echo "\n";
            // echo "<br>";
        }
    }
    /**
     * Displays a single Planta model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $params = Yii::$app->request->queryParams;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'anio' => $params['anio'],
        ]);
    }

    /**
     * Creates a new Planta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Planta();

		$params = Yii::$app->request->queryParams;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id,  'anio' => $params['anio'],'especialidad' => $params['especialidad']]);
        } else {
            return $this->render('create', [
                'model' => $model,
	    	'anio' => $params['anio'],
	    	'especialidad' => $params['especialidad'],
            ]);
        }
    }

    /**
     * Updates an existing Planta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
	
		$params = Yii::$app->request->queryParams;

		$model = $this->findModel($id);
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'anio' => $params['anio'],'especialidad' => $params['especialidad']]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'anio' => $params['anio'],
				'especialidad' => $params['especialidad'],
            ]);
        }
    }

    /**
     * Deletes an existing Planta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
		$params = Yii::$app->request->queryParams;


        return $this->redirect(['index','anio' => $params['anio'],'especialidad'=>$params['especialidad']]);
    }

    /**
     * Finds the Planta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Planta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Planta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
