<?php

namespace app\models\form;

class TextareaField extends BaseField
{
    public function renderInput(): string
    {
        $value = $this->model->{$this->attribute};
        $errorClass = $this->model->hasError($this->attribute) ? ' is-invalid' : '';
        return sprintf('<textarea name="%s" class="form-control%s">%s</textarea>',
            $this->attribute,
            $errorClass,
            $value,
        );
    }
}