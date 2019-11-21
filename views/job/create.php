<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $job app\models\job */
/* @var $form ActiveForm */
?>
<div class="job-create">
<h2 class="page-header">Create Job</h2>
    <?php $form = ActiveForm::begin(); ?>
<?= $form->errorSummary($job) ?>
        <?= $form->field($job, 'category_id')->dropDownList(Category::find()->
        select(['name','id'])->indexBy('id')->column(),['prompt' => 'Select Category']); ?>
        <?= $form->field($job, 'title') ?>
        <?= $form->field($job, 'description')->textArea(['rows'=> 5]) ?>
        <?= $form->field($job, 'type')->dropDownList([
            'Full Time' => 'Full Time',
            'Part Time' => 'Part Time',
            'As Needed' => 'As Needed'
        ],['prompt' => 'Select Type']) ?>
        <?= $form->field($job, 'requirements') ?>
        <?= $form->field($job, 'salary_range')->dropDownList([
            'Under €20.000' => 'Under €20.000',
            '€20.000 - 40.000' => '€20.000 - 40.000',
            '€40.000 - 60.000' => '€40.000 - 60.000',
            '€60.000 - 80.000' => '€60.000 - 80.000',
            '€80.000 - 100.000' => '€80.000 - 100.000'
        ],['prompt' => 'Select Salary']) ?>
        <?= $form->field($job, 'city') ?>
        <?= $form->field($job, 'contact_email') ?>
        <?= $form->field($job, 'contact_phone') ?>
        <?= $form->field($job, 'is_published')->radioList(array('1' => 'Yes','0' => 'No')) ?>

    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- job-create -->
