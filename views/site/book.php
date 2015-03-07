<?php
use yii\helpers\Html;
$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo Html::a('Новая книга', array('site/createbook'), array('class' => 'btn btn-primary pull-right')); ?>
<div class="clearfix"></div>
<hr />
<?php if(Yii::$app->session->hasFlash('BookDeletedError')): ?>
<div class="alert alert-error">
    There was an error deleting your book!
</div>
<?php endif; ?>
 
<?php if(Yii::$app->session->hasFlash('BookDeleted')): ?>
<div class="alert alert-success">
    Your book has successfully been deleted!
</div>
<?php endif; ?>
<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Название</td>
        <td>Дата создания</td>
        <td>Дата обновления</td>
        <td>Действия</td>
    </tr>
    <?php foreach ($data as $book): ?>
        <tr>
            <td>
                <?php echo $book->id; ?>
            </td>
            <td><?php echo $book->name; ?></td>
            <td><?php echo $book->created; ?></td>
            <td><?php echo $book->updated; ?></td>
            <td>
                <?php echo Html::a(NULL, array('site/updatebook', 'id'=>$book->id), array('class'=>'icon icon-edit')); ?>
                <?php echo Html::a(NULL, array('site/deletebook', 'id'=>$book->id), array('class'=>'icon icon-trash')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
