<?php

namespace backend\modules\posts\controllers;

use Yii;
use common\models\InstPosts;
use backend\modules\posts\models\InstPostsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use common\services\PublicationService;
use yii\base\Module;
use  backend\modules\posts\forms\CreateForm;
use  backend\modules\posts\forms\UpdateForm;

/**
 * PostsController implements the CRUD actions for InstPosts model.
 */
class PostsController extends Controller
{

    private $publicationService;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function __construct($id, Module $module,PublicationService $publicationService, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->publicationService = $publicationService;
    }

    /**
     * Lists all InstPosts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InstPostsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InstPosts model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new InstPosts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $form = new CreateForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate())
        {
            $photo = $this->publicationService->saveImage($form->photo);

            $post = InstPosts::create($form->caption,$form->pub_date,$photo,$form->account_id);
            $post->save(false);

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $form,
        ]);
    }

    /**
     * Updates an existing InstPosts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $post = $this->findModel($id);
        $form = new UpdateForm($post);

        if ($form->load(Yii::$app->request->post()) && $form->validate())
        {
            if($form->photo)
            {
                $this->publicationService->deleteImage($post->photo);
                $post->photo = $this->publicationService->saveImage($form->photo);
            }

            $post->pub_date = $form->pub_date;
            $post->caption = $form->caption;
            $post->account_id = $form->account_id;

            $post->save(false);

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $form,
        ]);
    }

    /**
     * Deletes an existing InstPosts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $post = $this->findModel($id);

        $this->publicationService->deleteImage($post->photo);

        $post->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InstPosts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InstPosts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InstPosts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
