<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    
    <?=
        $form->field($model, 'company_start_date')->widget(DatePicker::classname(),[
            'name' => 'check_date',
            'value' => '01/29/2014',
            'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'pickerIcon' => '<i class="fa fa-calendar-alt text-primary"></i>',
            'removeIcon' => '<i class="fa fa-trash text-danger"></i>',
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy/mm/dd',
                'todayHighlight' => true
            ]
        ]);
    
       
    
    ?>
    
    <?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => 'Status']) ?>

    <?= $form->field($model , 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
