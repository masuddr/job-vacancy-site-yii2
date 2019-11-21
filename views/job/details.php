
<a href="index.php?r=job">Back to jobs</a>
<h2 class="page-header"><?= $job->title ?> <small> in <?= $job->city; ?></small>
<?php if(Yii::$app->user->identity->id == $job->user_id): ?>
<span class="pull-right">
<a href="index.php?r=job/edit&id=<?= $job->id; ?>" class="btn btn-default">Edit</a> <a href="index.php?r=job/delete&id=<?= $job->id; ?>" class="btn btn-danger">Delete</a>
</span>
<?php endif; ?>
</h2>
<?php if(!empty($job->description)): ?>
<div class="well">
<h4>Job Description:</h4>
<?= $job->description ?>
</div>
<?php endif; ?>

<ul class="list-group">
<?php if(!empty($job->create_date)): ?>
<?php $date = strtotime($job->create_date); ?>
<?php $formatted_date = date('F j, Y, g:i a',$date); ?>
<li class="list-group-item">Listing Date: <strong> <?= $formatted_date  ?></strong></li>
<?php endif; ?>
</ul>

<ul class="list-group">
<?php if(!empty($job->category->name)): ?>
<li class="list-group-item">Category: <strong> <?= $job->category->name  ?></strong></li>
<?php endif; ?>
</ul>

<ul class="list-group">
<?php if(!empty($job->type)): ?>
<li class="list-group-item">Type: <strong> <?= $job->type  ?></strong></li>
<?php endif; ?>
</ul>

<ul class="list-group">
<?php if(!empty($job->salary_range)): ?>
<li class="list-group-item">Salary: <strong>€ <?= $job->salary_range  ?></strong></li>
<?php endif; ?>
</ul>

<ul class="list-group">
<?php if(!empty($job->contact_email) || !empty($job->contact_phone)): ?>
<li class="list-group-item">Contact: <strong> <?= $job->contact_phone  ?> <?= $job->contact_email; ?></strong></li>
<?php endif; ?>
</ul>
