<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h2 class="page-header">Jobs <a href="/index.php?r=job/create" class="btn btn-primary pull-right">Create</a></h2>

<ul class="list-group">
<?php if(!empty($jobs)) : ?>
<?php foreach($jobs as $job) : ?>
<?php $date = strtotime($job->create_date); ?>
<?php $formatted_date = date('F j, Y, g:i a',$date); ?>
<li class="list-group-item"> <a href="/index.php?r=job/details&id=<?= $job->id ?>"><?= $job->title ?></a> - <strong><?= $job->city; ?></strong> Listed on <?= $formatted_date; ?></li>
<?php endforeach ?>
</ul>
<?php else: ?>
<p>No jobs </p>
<?php endif; ?>
<?= LinkPager::widget(['pagination' => $pagination]);