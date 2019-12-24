<?php

namespace Modules\Faq\Table;

use Modules\Faq\Http\Form\FaqFilterForm;
use Modules\Faq\Repositories\FaqRepository;
use Modules\Rarv\Table\Table;

class FaqTable extends Table
{
    protected $repository = FaqRepository::class;

    protected $columns = [];

    protected $filterForm = FaqFilterForm::class;

    public function getColumns()
    {
        return array(
            'question',
            'answer',
            'heading_label' => function ($row) {
                return $row->heading->label . ' ('.$row->heading->id.')';
            },
        );
    }
}
