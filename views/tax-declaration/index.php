<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaxDeclarationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tax Declarations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-declaration-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php 
        // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p>
        <?= Html::a('Create Tax Declaration', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Upload Master List', ['upload'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model) {
            $url = Url::to(['tax-declaration/view', 'id' => $model['td_no']]);
            return ['onclick' => "window.location.href='{$url}'"];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'td_no',
            'arp_no',
            'property_owner',
            'property_index_no',
            'address',
            // 'tel_no',
            // 'survey_no',
            // 'classification',
            // 'area',
            // 'market_value',
            // 'actual_use',
            // 'assessment_level',
            // 'assessed_value',
            // 'php',
            // 'total_php',
            // 'tot_assessed_value',
            // 'effectivity_quarter',
            // 'effectivity_year',
            // 'property_kind',
            // 'location',
            // 'taxability',
            // 'faas',
            // 'cancels_arp_no',
            // 'cancels_assessed_value',
            // 'beneficial_user',
            // 'user_tel_no',
            // 'user_address',
            // 'otc',
            // 'oct',
            // 'date',
            // 'lot_no',
            // 'blk_no',
            // 'bound_south',
            // 'bound_north',
            // 'bound_east',
            // 'bound_west',
            // 'mun_assessor',
            // 'prov_assessor',
            // 'tax_dec_pdf',
            // 'tax_dec_filename',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
