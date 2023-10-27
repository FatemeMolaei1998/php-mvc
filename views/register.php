<?php
/** @var $model app\models\User */

$this->title = 'Register';

?>

<h1  class="mb-3">
    Register
</h1>
<?php use app\models\form\Form;

echo $form = Form::begin('', "post") ?>
    <div class="row">
        <div class="col"><?php echo $form->field($model, 'firstname') ?></div>
        <div class="col"><?php echo $form->field($model, 'lastname') ?></div>
    </div>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>

    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>
