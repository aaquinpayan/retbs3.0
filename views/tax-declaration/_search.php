<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclarationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tax-declaration-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'td_no') ?>

    <?= $form->field($model, 'property_owner') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'property_index_no') ?>

    <?= $form->field($model, 'arp_no') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'tel_no') ?>

    <?php // echo $form->field($model, 'survey_no') ?>

    <?php // echo $form->field($model, 'classification') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'market_value') ?>

    <?php // echo $form->field($model, 'actual_use') ?>

    <?php // echo $form->field($model, 'assessment_level') ?>

    <?php // echo $form->field($model, 'assessed_value') ?>

    <?php // echo $form->field($model, 'php') ?>

    <?php // echo $form->field($model, 'total_php') ?>

    <?php // echo $form->field($model, 'tot_assessed_value') ?>

    <?php // echo $form->field($model, 'effectivity_quarter') ?>

    <?php // echo $form->field($model, 'effectivity_year') ?>

    <?php // echo $form->field($model, 'property_kind') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'taxability') ?>

    <?php // echo $form->field($model, 'faas') ?>

    <?php // echo $form->field($model, 'cancels_arp_no') ?>

    <?php // echo $form->field($model, 'cancels_assessed_value') ?>

    <?php // echo $form->field($model, 'beneficial_user') ?>

    <?php // echo $form->field($model, 'user_tel_no') ?>

    <?php // echo $form->field($model, 'user_address') ?>

    <?php // echo $form->field($model, 'otc') ?>

    <?php // echo $form->field($model, 'oct') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'lot_no') ?>

    <?php // echo $form->field($model, 'blk_no') ?>

    <?php // echo $form->field($model, 'bound_south') ?>

    <?php // echo $form->field($model, 'bound_north') ?>

    <?php // echo $form->field($model, 'bound_east') ?>

    <?php // echo $form->field($model, 'bound_west') ?>

    <?php // echo $form->field($model, 'mun_assessor') ?>

    <?php // echo $form->field($model, 'prov_assessor') ?>

    <?php // echo $form->field($model, 'tax_dec_pdf') ?>

    <?php // echo $form->field($model, 'tax_dec_filename') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
