<?php

namespace Modules\Faq\Http\Form;

use Modules\Faq\Repositories\FaqRepository;
use Modules\Rarv\Form\Form;

class FaqForm extends Form
{
    protected $repository = FaqRepository::class;

    public function boot()
    {
        $this->setField('question', 'normalInput')
            ->setColumn(6)
            ->setLabel('Question:')
            ->setRules(['required']);

        $this->setField('answer', 'normalTextarea')
            ->setColumn(6)
            ->setRules(['required']);
    }
}
