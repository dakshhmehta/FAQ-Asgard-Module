<?php

namespace Modules\Faq\Table;

use Modules\Faq\Repositories\FaqHeadingRepository;
use Modules\Rarv\Table\Table;

class FaqHeadingTable extends Table
{
    protected $repository = FaqHeadingRepository::class;

    protected $columns = [
        'label'
    ];
}
