<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclaration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tax-declaration-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $taxpayers = ArrayHelper::map(\app\models\Taxpayer::find()->all(), 'full_name', 'full_name'); ?>

        <?= $form->field($model, 'arp_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'property_index_no')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'address')->textarea()->label('Address') ?>

    <?= $form->field($model, 'tel_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'survey_no')->textInput() ?>

    <?= $form->field($model, 'classification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput() ?>

    <?= $form->field($model, 'market_value')->textInput() ?>

    <?= $form->field($model, 'actual_use')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assessment_level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assessed_value')->textInput() ?>

    <?= $form->field($model, 'php')->textInput() ?>

    <?= $form->field($model, 'total_php')->textInput() ?>

    <!-- <?= $form->field($model, 'tot_assessed_value')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'effectivity_quarter')->textInput() ?>

    <?= $form->field($model, 'effectivity_year')->textInput() ?>

    <?php echo $form->field($model, 'property_kind')->dropDownList(['Land' => 'Land', 'Building' => 'Building', 'Machinery' => 'Machinery', 'Others' => 'Others']); ?>

    <?= $form->field($model, 'location')->textarea()->label('Location (Num & Street, Brgy/District, Municipality & Province/City)') ?>

    <?= $form->field($model, 'taxability')->radioList(array('Taxable'=>'Taxable', 'Exempt'=>'Exempt')); ?>

    <?= $form->field($model, 'cancels_arp_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cancels_assessed_value')->textInput() ?>

    <?= $form->field($model, 'beneficial_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_tel_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oct')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lot_no')->textInput() ?>

    <?= $form->field($model, 'blk_no')->textInput() ?>

    <?= $form->field($model, 'bound_south')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bound_north')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bound_east')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bound_west')->textInput(['maxlength' => true]) ?>

   <!--  <?= $form->field($model, 'mun_assessor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prov_assessor')->textInput(['maxlength' => true]) ?> -->
    <!-- <?= $form->field($model, 'tax_dec_pdf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_dec_filename')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'faas')->fileInput() ?>
     <?= $form->field($model, 'taxdec')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
