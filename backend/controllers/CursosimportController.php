<?php

namespace backend\controllers;

use Yii;
use backend\models\CursosImport;
use backend\models\CursosImportSearch;
use backend\models\Cursos;
use backend\models\Materias;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * DocentesimportController implements the CRUD actions for DocentesImport model.
 */
class CursosimportController extends Controller
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
     * Lists all DocentesImport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CursosImportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DocentesImport model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DocentesImport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CursosImport();
        $cantidad = 0;
        $cantidadok = 0;
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'file');
            $newFilePath = "/tmp/file.csv";
            $uploadSuccess = $file->saveAs($newFilePath);
            if (!$uploadSuccess) {
            throw new CHttpException('Error uploading file.');  
            }
            $content=file_get_contents($newFilePath);
            
               $handle = fopen($newFilePath, "r");
                     while (($fileop = fgetcsv($handle, 1000, ",")) !== false) 
                     {
                       $cantidad = $cantidad + 1;
                       try {
                             $mod = new Cursos;
                             $materia = Materias::find()->where("codigo = '".$fileop[0]."' and especialidad='".$fileop[5]."'")->orderBy(['id'=>SORT_ASC])->limit(1)->one();
                             $mod->id_materia = $materia->id;
                             $mod->anio = $fileop[1];
			     $mod->anio_academico = $fileop[2];
                             $mod->comision= $fileop[3];
                             $mod->cantidad_alumnos = $fileop[4];
			     $mod->codigo_especialidad = $fileop[5];
                             $mod->save();
                             $cantidadok = $cantidadok + 1;
                            
                       } catch (\Exception $e ) {
                           //$mal[]=" ".$cantidad." Codigo de error: ".$e->getCode();
                           $mal[]=" ".$cantidad." Codigo de error: ".$e;
                       }
                       }
                     
                      return $this->render('create', [
                'model' => $model,'cantidad'=>(($cantidadok) * 100  / $cantidad),'mal'=>$mal,
            ]);
                     

            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DocentesImport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->dni]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DocentesImport model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DocentesImport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return DocentesImport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CursosImport::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

   
    protected function save()
    {
  
    }


    public function actionUpload()
    {
        $model = new CursosImport();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                print_r($_REQUEST);
                exit();
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }




}
