<?php

namespace Modules\Faq\Http\Form;

use Modules\Rarv\Form\Form;

class FaqFilterForm extends Form
{
    public function boot()
    {
        $headingField = new SelectField('heading_id', FaqHeading::all()->pluck('label', 'id')->toArray());
        $this->setField($headingField)
            ->setLabel('Heading');

        $this->setField('question', 'normalInput')
            ->setLabel('Question');
    }

    public function handle($filters, $query)
    {
        // Nothing to do,
        // It will automatically apply LIKE %{value}% foreach name in case of text field
        // Or where in in case of dropdown
    }
}
