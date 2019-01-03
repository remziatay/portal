<?php

use \yii\grid\GridView;
echo GridView::widget([
	'dataProvider' => $provider,
	'columns' => [
		'id',
		'username',
		'email',
		//'password_hash',
		'created_at',
		'updated_at'
	]
]);

?>