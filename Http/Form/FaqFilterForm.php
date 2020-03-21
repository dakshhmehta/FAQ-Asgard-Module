<?php

namespace Modules\Faq\Http\Form;

use Illuminate\Database\Eloquent\Builder;
use Modules\Faq\Entities\FaqHeading;
use Modules\Rarv\Form\Fields\SelectField;
use Modules\Rarv\Form\FilterForm;

class FaqFilterForm extends FilterForm
{
    public function boot()
    {
        $headingField = new SelectField('heading_id', FaqHeading::all()->pluck('label', 'id')->toArray());
        $this->setField($headingField)
            ->setParameters(['icon' => 'list'])
            ->setColumn(6)
            ->setLabel('Heading');

        $this->setField('question', 'normalInput')
            ->setColumn(3)
            ->setLabel('Question');
    }
}
