<?php

namespace Modules\Faq\Http\Form;

use Modules\Faq\Entities\FaqHeading;
use Modules\Faq\Repositories\FaqRepository;
use Modules\Rarv\Form\Fields\SelectField;
use Modules\Rarv\Form\Form;

class FaqForm extends Form
{
    protected $repository = FaqRepository::class;

    public function boot()
    {
        $field = new SelectField('heading_id', FaqHeading::all()->pluck('label', 'id')->toArray());
        $this->setField($field)
            ->setLabel('Heading')
            ->setRules(['required']);

        $this->setField('question', 'normalInput')
            ->setColumn(6)
            ->setLabel('Question:')
            ->setRules(['required']);

        $this->setField('answer', 'normalTextarea')
            ->setColumn(6)
            ->setRules(['required']);
    }
}
