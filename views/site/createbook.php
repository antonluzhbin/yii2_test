<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;    
use yii\db\Expression;

$form = ActiveForm::begin([
    'id' => 'ride-form',
    'enableClientValidation'=>false,
    'validateOnSubmit' => true
    ]); ?>

<?php echo $form->field($model, 'name')->textInput(array('class' => 'span8'))->label('Название'); ?>

    <div class="form-actions">
        <?php echo Html::submitButton('Submit', null, null, array('class' => 'btn btn-primary')); ?>
    </div>

<?php ActiveForm::end(); ?>
