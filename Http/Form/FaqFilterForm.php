<?php

namespace Modules\Faq\Http\Form;

use Modules\Faq\Repositories\FaqRepository;
use Modules\Rarv\Form\Form;

class FaqFilterForm extends FilterForm
{
    public function boot()
    {
        $this->setField('question', 'normalSelect', [Question::all()]);
            ->setLabel('Question:');

        $this->setField('answer', 'normalInput')
            ->setLabel('Answer:');
    }

    public function handle($filters, $query)
    {
        // Nothing to do,
        // It will automatically apply LIKE %{value}% foreach name in case of text field
        // Or where in in case of dropdown
    }
}
