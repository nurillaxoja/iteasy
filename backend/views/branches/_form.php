<?php

use common\models\Companies;
use common\models\Departments;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
        $form->field($model, 'company_id' )->dropDownList(
            ArrayHelper::map(Companies::find()->all(), 'id', 'name'),
            ['prompt' => 'Select Company']
        ) ?>

    <?= 
        $form->field($model, 'department_id')->widget(\kartik\select2\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(Departments::find()->all(), 'id', 'name'),
            'options' => ['placeholder' => 'Tanlang', 'multiple' => false, 'required' => true],
            'theme' => \kartik\select2\Select2::THEME_KRAJEE,
            'size' => 'xs',
        ]);
        
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'status')->dropDownList(['active' => 'Active', 'inactive' => 'Inactive',], ['prompt' => 'Status'],['massage'=>'please fill the box']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>