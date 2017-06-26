<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaxpayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Taxpayers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taxpayer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Taxpayer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'taxpayer_id',
            'full_name',
            // 'first_name',
            // 'middle_name',
            // 'last_name',
            //'contact_no',
            //'gender',
            //'occupation',
            'address',
            //'payment_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
