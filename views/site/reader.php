<?php
use yii\helpers\Html;
$this->title = 'Читатели';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo Html::a('Новый читатель', array('site/createreader'), array('class' => 'btn btn-primary pull-right')); ?>
<div class="clearfix"></div>
<hr />
<?php if(Yii::$app->session->hasFlash('ReaderDeletedError')): ?>
<div class="alert alert-error">
    There was an error deleting your reader!
</div>
<?php endif; ?>
 
<?php if(Yii::$app->session->hasFlash('ReaderDeleted')): ?>
<div class="alert alert-success">
    Your reader has successfully been deleted!
</div>
<?php endif; ?>
<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Читатель</td>
        <td>Дата создания</td>
        <td>Дата обновления</td>
        <td>Действия</td>
    </tr>
    <?php foreach ($data as $reader): ?>
        <tr>
            <td>
                <?php echo $reader->id; ?>
            </td>
            <td><?php echo $reader->name; ?></td>
            <td><?php echo $reader->created; ?></td>
            <td><?php echo $reader->updated; ?></td>
            <td>
                <?php echo Html::a(NULL, array('site/updatereader', 'id'=>$reader->id), array('class'=>'icon icon-edit')); ?>
                <?php echo Html::a(NULL, array('site/deletereader', 'id'=>$reader->id), array('class'=>'icon icon-trash')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
