<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class TripayChannel extends Field
{
    protected array $options = [];

    protected string $view = 'forms.components.tripay-channel';

    public function options($options): static
    {
        $this->options = $options;
        return $this;
    }

    public function getOptions()
    {
        return $this->options;
    }
}
