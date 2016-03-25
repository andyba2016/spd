<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\SignupForm;
use yii\web\UploadedFile;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //$model = new User();
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);

       /* if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
        /**
     * Modify an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionModify($id)
    {     
          $request = Yii::$app->request;
          $post = $request->post(); 
          if(isset($post['id_usuario']) && isset($post['id_especialidad'])){            
             $command = Yii::$app->db->createCommand(
		'DELETE FROM especialidades_usuario WHERE id_usuario='.$post['id_usuario']);
            $command->execute();
                
              foreach($post['id_especialidad'] as $esp){
                  $modelo = new EspecialidadesUsuario;
                  $modelo->id_especialidad = $esp;
                  $modelo->id_usuario = $post['id_usuario'];
                  $modelo->save();  // equivalent to $model->insert();
              }
          }
    
          
          $usuario = $this->findModel($id);
          $model = EspecialidadesUsuario::findAll(['id_usuario'=>$id,'isActive'=>'TRUE']);
          
          return $this->render('modify', [
               'model' => $model,
               'usuario'=>$usuario,
               'id'=>$id
           ]);
        
    }

     public function actionProfile($id)
    {     
        $model = $this->findModel($id);

	$post=Yii::$app->request->post();
	


       // if (Yii::$app->request->isPost ) {
	if (isset($post['User'])){

		$post=$post['User'];	
		$model->username = $post['username'];
		$model->email = $post['email'];

 		$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
		$model->save();
                
$model->upload($id);

		

 return $this->render('profile', [
                'model' => $model,
            ]);

        } else {
            return $this->render('profile', [
                'model' => $model,
            ]);
        }
        
    }
	
	
	
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
