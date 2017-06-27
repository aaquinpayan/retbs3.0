<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

$this->title = 'Real Estate Tax Billing System';
?>

<?php $this->beginContent('@app/views/layouts/main.php'); ?>
	<div class="sidenav">
	    <?php
	        use kartik\widgets\SideNav; //side nav extension

	        echo SideNav::widget([
	            'type' => SideNav::TYPE_DEFAULT,
	            'heading' => 'Administrator', //dynamic - user_type
	            'items' => [
	                ['label' => 'Taxpayer Profiles', 'icon' => 'user', 'url' => ['taxpayer/index']],
	                //['label' => 'Real Estate Properties', 'icon' => 'home', 'url' => ['property/index']],
	                //['label' => 'Tax Declaration', 'icon' => 'home', 'url' => ['tax-declaration/index']],
	                ['label' => 'Statement of Account', 'icon' => 'home', 'url' => ['account-statement/index']],
	                //['label' => 'Accounts', 'icon' => 'user', 'items' => [
	                    // ['label' => 'Taxpayer', 'url' => ['user/taxpayer']],
	                   // ['label' => 'Create User', 'url' => ['user/create']],
	                   // ['label' => 'Assessor', 'url' => ['user/assessor']],
	                   // ['label' => 'Treasurer', 'url' => ['user/treasurer']],
	                   // ['label' => 'Administrator', 'url' => ['user/admin']],
	                //]],
	                ['label' => 'Change Password', 'icon' => 'pencil', 'url' => ['user/password']],
	            ],
	        ]);    
	    ?>  
	</div>
	<div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <div class="site-index">
		    <div class="jumbotron">
		        <h2>Welcome Treasurer!</h2>
		    </div>
		</div>
	</div>

<?php $this->endContent();

