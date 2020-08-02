<?php

use common\models\Branches;
use common\models\Companies;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_id')->dropDownList(
        ArrayHelper::map(Companies::find()->all(), 'id', 'name'),
        ['prompt' => 'Select Company name']
    ) ?>

    <?= $form->field($model, 'branch_id')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['active' => 'Active', 'inactive' => 'Inactive',], ['prompt' => 'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>