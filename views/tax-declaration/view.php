<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclaration */

$this->title = $model->property_owner;
$this->params['breadcrumbs'][] = ['label' => 'Tax Declarations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-declaration-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p style="float: right;">
        <?= Html::a('Tax Declaration', ['report', 'id' => $model->td_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Field Appraisal & Assessment Sheet', ['report', 'id' => $model->td_no], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'property_owner',
            'property_index_no',
            'arp_no',
            'address',
            'property_kind', //add
            'classification',
            'location', //add
            'assessed_value',
            'taxability', //add
            'effectivity_year', //not sure
            'cancels_arp_no',
            'cancels_assessed_value',
        ],
    ]) ?>


</div>