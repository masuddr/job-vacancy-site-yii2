<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $category app\models\Category */
/* @var $form ActiveForm */
?>
<div class="category-create">

    <?php $form = ActiveForm::begin(); ?>
<h2 class="page-header">Add Category</h2>
        <?= $form->field($category, 'name') ?>
    <?php if(Yii::$app->session->getFlash('success') !== null): ?>

<div class="alert alert-success"><?= Yii::$app->session->getFlash('success'); ?></div>
    <?php endif; ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- category-create -->
