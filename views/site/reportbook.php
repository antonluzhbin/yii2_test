<?php
use yii\helpers\Html;
$this->title = 'Отчет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clearfix"></div>
<hr />

<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Название</td>
        <td>Количество соавторов</td>
    </tr>
    <?php foreach ($data as $book): ?>
        <tr>
            <td>
                <?php echo $book['id']; ?>
            </td>
            <td><?php echo $book['name']; ?></td>
            <td><?php echo $book['cnt']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
