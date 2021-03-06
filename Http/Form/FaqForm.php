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
        $model = $this->getModel();

        $field = new SelectField('heading_id', FaqHeading::all()->pluck('label', 'id')->toArray());
        $this->setField($field)
            ->setParameters(['icon' => 'cog'])
            ->setLabel('Heading')
            ->setRules(['required']);

        $this->setField('question', 'textGroup')
            ->setColumn(6)
            ->setLabel('Question:')
            ->permission(function () use ($model) {
                // Configure the field to only editable in edit mode
                // if at the time of creation, question is related
                // to Rarv module.

                if ($model) {
                    return strpos(strtolower($model->question), 'rarv') !== false;
                }

                return true;
            })
            ->setRules(['required']);

        $this->setField('answer', 'normalTextarea')
            ->setColumn(6)
            ->setRules(['required']);
    }
}
