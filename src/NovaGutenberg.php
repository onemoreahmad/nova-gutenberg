<?php

namespace VysotskyProductions\NovaGutenberg;

use Laravel\Nova\Fields\Field;

class NovaGutenberg extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'NovaGutenberg';

    public function direction($direction = 'ltr')
    {
        return $this->withMeta(['direction' => $direction]);
    }
}
