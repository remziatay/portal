<?php
namespace frontend\controllers;
use \yii\web\Controller;
use \yii\db\Query;
use \yii\data\ActiveDataProvider;
use \yii\grid\GridView;
use \yii\data\Sort;

class BasicController extends Controller {
	public function actionIndex(){
		echo "merhaba";
	}
	
	public function actionMerhaba(){
		echo "Sa";
	}
	
	public function actionUsers(){
        $query = new Query();
        $provider = new ActiveDataProvider([
			'query' => $query->from('user'),
			'pagination' => [
				'pageSize' => 10,
			],
			'sort' => new Sort([
				'attributes' => [
					'email',
					'username',
					'id'
				]
			]),
		]);
		
		$data ["provider"] = $provider;
		
        return $this->render("users",$data);
    }
}
?>