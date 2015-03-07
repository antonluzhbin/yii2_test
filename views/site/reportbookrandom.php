<?php
use yii\helpers\Html;
$this->title = 'пять случайных книг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clearfix"></div>
<hr />
<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Название</td>
        <td>Дата создания</td>
        <td>Дата обновления</td>
    </tr>
    <?php foreach ($data as $book): ?>
        <tr>
            <td>
                <?php echo $book['id']; ?>
            </td>
            <td><?php echo $book['name']; ?></td>
            <td><?php echo $book['created']; ?></td>
            <td><?php echo $book['updated']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
