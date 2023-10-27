<?php
/** @var $model app\models\User */

$this->title = 'Login';

?>

<h1  class="mb-3">
    Login
</h1>
<?php use app\models\form\Form;

echo $form = Form::begin('', "post") ?>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>

<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>
