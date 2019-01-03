<?php
namespace console\controllers;
use \yii\console\Controller;

class BasicController extends Controller {
	public function actionIndex(){
	  $user = \Yii::$app->db
        ->createCommand('SELECT email FROM user;')
        ->queryColumn();
		
	$result = \Yii::$app->db
	  ->createCommand("SELECT COUNT(*) FROM user")
	  ->queryScalar();
		  
		print_r($user);
		print_r($result);
		echo "\n";
		//var_dump($user);
	  return 0;
	}
	
	public function actionUser(){
		//\Yii::$app->db
		//->createCommand('INSERT INTO user (email, password_hash) VALUES ("test3@example.com", "test3");')
		//->execute();
		
		// INSERT ( tablename, [ attributes => attr ] )
	\Yii::$app->db
		->createCommand()
		->insert('user', [
		  'email'      => 'test4@example.com',
		  'password_hash'   => md5('changeme7'),
		  'username' => 'Test',
		  'created_at' => time(),
		  'updated_at' => time(),
		  'access_token' => md5(time())
		])
	   ->execute();
	}
	
	public function actionUserUpdate(){
		// UPDATE (tablename, [ attributes => attr ], condition )
		\Yii::$app->db
			->createCommand()
			->update('user', [
				'updated_at' => time()
			], '1 = 1')
		   ->execute();
	}
	
	public function actionAddFew(){
		// batchInsert( tablename, [ properties ], [ rows ] )
		\Yii::$app->db
			->createCommand()
			->batchInsert('user', ['email', 'password_hash', 'username', 'created_at', 'updated_at', 'access_token'], 
			[
				['james.franklin@example.com', md5('changeme7'), 'JamesFranklin', time(), time(), md5(time())],
				['linda.marks@example.com', md5('changeme7'), 'LindaMarks', time(), time(), md5(time()+1)],
				['roger.martin@example.com', md5('changeme7'), 'RogerMartin', time(), time(), md5(time()+2)]
			])
			->execute();
	}
}
?>