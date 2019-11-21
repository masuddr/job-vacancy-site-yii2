<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h2 class="page-header">Categories <a href="/index.php?r=category/create" class="btn btn-primary pull-right">Create</a></h2>

<ul class="list-group">

<?php foreach($categories as $category) : ?>
<li class="list-group-item"> <a href="/index.php?r=job&category=<?= $category->id ?>"><?= $category->name ?></a></li>
<?php endforeach ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]);