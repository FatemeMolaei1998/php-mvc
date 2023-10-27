<?php
/** @var $model app\models\User */
$this->title = 'Contact Us';
?>

<h1>
    CONTACT US
</h1>
<?php use app\models\form\Form;
use app\models\form\TextareaField as TextareaFieldAlias;

echo $form = Form::begin('', "post") ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaFieldAlias($model, 'body')?>

<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>
