<?php

namespace Modules\Faq\Http\Controllers\Admin;

use Modules\Faq\Http\Form\FaqHeadingForm;
use Modules\Faq\Table\FaqHeadingTable;
use Modules\Rarv\Http\Controllers\CRUDController;

class FaqHeadingController extends CRUDController
{
    public function boot()
    {
        $this->table = new FaqHeadingTable('faq.faqheading');
        $this->createForm = new FaqHeadingForm('faq.faqheading');
        $this->editForm = new FaqHeadingForm('faq.faqheading');
    }
}
