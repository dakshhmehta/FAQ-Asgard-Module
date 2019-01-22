<?php

namespace Modules\Faq\Table;

use Modules\Faq\Http\Form\FaqFilterForm;
use Modules\Faq\Repositories\FaqRepository;
use Modules\Rarv\Table\Table;

class FaqTable extends Table
{
    protected $repository = FaqRepository::class;

    protected $columns = [
        'question', 'answer',
    ];

    protected $filterForm = FaqFilterForm::class;
}
