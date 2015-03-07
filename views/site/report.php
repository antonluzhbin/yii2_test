<?php
use yii\helpers\Html;
$this->title = 'Отчеты';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if(Yii::$app->session->hasFlash('BookReportTest')): ?>
<!--<div class="alert alert-success">
    Данные сгенерированы!
</div>-->
<?php endif; ?>

<!--<div><?php echo Html::a("Загрузка тестовых данных", array('site/reporttest')); ?></div>-->
<div><?php echo Html::a("Вывод списка книг, находящихся на руках у читателей, и имеющих не менее трех со-авторов.", array('site/reportbook')); ?></div>
<div><?php echo Html::a("Вывод списка авторов, чьи книги в данный момент читает более трех читателей.", array('site/reportauthor')); ?></div>
<div><?php echo Html::a("Вывод пяти случайных книг.", array('site/reportbookrandom')); ?></div>



