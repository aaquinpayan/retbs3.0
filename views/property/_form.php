<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Property */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="property-form">

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'property_index_no')->textInput(['maxlength' => true]) ?>

    <?php $taxpayer=\app\models\Taxpayer::find()->all(); ?>
    <?php $taxpayerList = ArrayHelper::map($taxpayer,'full_name', 'full_name') ?>
    <?= $form->field($model, 'name_of_owner')->dropDownList($taxpayerList, ['prompt' => '---- Select Name of Owner ----'])->label('Name of Owner') ?>

    <?php if(1==2) echo $form->field($model, 'kind')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'north_boundary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'south_boundary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'east_boundary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'west_boundary')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
