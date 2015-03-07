<?php
use yii\helpers\Html;
$this->title = 'Авторы';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo Html::a('Новый автор', array('site/createauthor'), array('class' => 'btn btn-primary pull-right')); ?>
<div class="clearfix"></div>
<hr />
<?php if(Yii::$app->session->hasFlash('AuthorDeletedError')): ?>
<div class="alert alert-error">
    There was an error deleting your author!
</div>
<?php endif; ?>
 
<?php if(Yii::$app->session->hasFlash('AuthorDeleted')): ?>
<div class="alert alert-success">
    Your author has successfully been deleted!
</div>
<?php endif; ?>
<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Автор</td>
        <td>Дата создания</td>
        <td>Дата обновления</td>
        <td>Действия</td>
    </tr>
    <?php foreach ($data as $author): ?>
        <tr>
            <td>
                <?php echo $author->id; ?>
            </td>
            <td><?php echo $author->name; ?></td>
            <td><?php echo $author->created; ?></td>
            <td><?php echo $author->updated; ?></td>
            <td>
                <?php echo Html::a(NULL, array('site/updateauthor', 'id'=>$author->id), array('class'=>'icon icon-edit')); ?>
                <?php echo Html::a(NULL, array('site/deleteauthor', 'id'=>$author->id), array('class'=>'icon icon-trash')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
