<?php

namespace Modules\Faq\Http\Form;

use Modules\Faq\Repositories\FaqHeadingRepository;
use Modules\Rarv\Form\Fields\SingleMediaField;
use Modules\Rarv\Form\Form;

class FaqHeadingForm extends Form
{
    protected $repository = FaqHeadingRepository::class;

    public function boot()
    {
        $imageField = new SingleMediaField('image');
        $this->setField($imageField)
            ->setLabel('Image');

        $this->setField('label', 'normalInput')
            ->setLabel('Label')
            ->setRules(['required']);
    }
}
