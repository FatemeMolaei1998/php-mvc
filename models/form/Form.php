<?php

namespace app\models\form;

use app\core\Model;

class Form
{

    public static function begin($action, $method): Form
    {
        $form = new Form();
        $form->formContent .= sprintf('<form action="%s" method="%s">', $action, $method);
        return $form;
    }
    public static function end(): string
    {
        return '</form>';
    }
    public static function field(Model $model, $attribute): InputField
    {
        return new InputField($model, $attribute);
    }
    public function __toString()
    {
        return $this->formContent;
    }

}