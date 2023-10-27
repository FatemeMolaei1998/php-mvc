<?php

namespace app\models\form;

use app\core\Model;

abstract class BaseField
{
    public Model $model;
    public string $attribute;
    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }
    abstract public function renderInput(): string;

    public function __toString(): string
    {
        $label = $this->model->getLabel($this->attribute);
        $errorMsg = $this->model->getFirstError($this->attribute);

        $template = '
            <div class="mb-3 form-group">
                <label class="form-label">%s</label>
                %s
                <div class="invalid-feedback">%s</div>
            </div>
        ';

        return sprintf(
            $template,
            $label,
            $this->renderInput(),
            $errorMsg
        );
    }
}