<?php
/**
 * UsernameController
 * @var $this yii\web\View
 * @var $model ommu\member\models\MemberHistoryUsername
 *
 * UsernameController implements the CRUD actions for MemberHistoryUsername model.
 * Reference start
 * TOC :
 *	Index
 *	View
 *	Delete
 *
 *	findModel
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 Ommu Platform (www.ommu.co)
 * @created date 30 October 2018, 23:04 WIB
 * @link https://github.com/ommu/mod-member
 *
 */
 
namespace ommu\member\controllers\history;

use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\components\Controller;
use ommu\member\models\MemberHistoryUsername;
use ommu\member\models\search\MemberHistoryUsername as MemberHistoryUsernameSearch;

class UsernameController extends Controller
{
	/**
	 * @inheritdoc
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

	/**
	 * Lists all MemberHistoryUsername models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new MemberHistoryUsernameSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		$gridColumn = Yii::$app->request->get('GridColumn', null);
		$cols = [];
		if($gridColumn != null && count($gridColumn) > 0) {
			foreach($gridColumn as $key => $val) {
				if($gridColumn[$key] == 1)
					$cols[] = $key;
			}
		}
		$columns = $searchModel->getGridColumn($cols);

		$this->view->title = Yii::t('app', 'History Usernames');
		$this->view->description = '';
		$this->view->keywords = '';
		return $this->render('admin_index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'columns' => $columns,
		]);
	}

	/**
	 * Displays a single MemberHistoryUsername model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		$model = $this->findModel($id);

		$this->view->title = Yii::t('app', 'Detail {model-class}: {username}', ['model-class' => 'History Username', 'username' => $model->username]);
		$this->view->description = '';
		$this->view->keywords = '';
		return $this->render('admin_view', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing MemberHistoryUsername model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		
		Yii::$app->session->setFlash('success', Yii::t('app', 'Member history username success deleted.'));
		return $this->redirect(['index']);
	}

	/**
	 * Finds the MemberHistoryUsername model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return MemberHistoryUsername the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = MemberHistoryUsername::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
	}
}