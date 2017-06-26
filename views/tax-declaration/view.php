<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use amilna\elevatezoom\ElevateZoom;
/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclaration */

$this->title = $model->arp_no;
$this->params['breadcrumbs'][] = ['label' => 'Tax Declarations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-declaration-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->td_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->td_no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'td_no',
            'property_owner',
            'first_name',
            'last_name',
            'property_index_no',
            'arp_no',
            'address',
            'tel_no',
            'survey_no',
            'classification',
            'area',
            'market_value',
            'actual_use',
            'assessment_level',
            'assessed_value',
            'php',
            'total_php',
            'tot_assessed_value',
            'effectivity_quarter',
            'effectivity_year',
            'property_kind',
            'location',
            'taxability',
            'faas',
            'taxdec',
            'cancels_arp_no',
            'cancels_owner',
            'cancels_assessed_value',
            'beneficial_user',
            'user_tel_no',
            'user_address',
            'otc',
            'oct',
            'date',
            'lot_no',
            'blk_no',
            'bound_south',
            'bound_north',
            'bound_east',
            'bound_west',
            'mun_assessor',
            'prov_assessor',
            // 'tax_dec_pdf',
            // 'tax_dec_filename',
        ],

    ])    ?>

    <?php
         $images = [('faas_uploads/' . $model->faas),('taxdec_uploads/' . $model->taxdec)];

        echo ElevateZoom::widget([
            'images'=>$images,
            // 'baseUrl'=>Yii::$app->urlManager->baseUrl.'/upload',
            'smallPrefix'=>'/.thumbs',
            'mediumPrefix'=>'',
        ]); 
    ?>

</div>
