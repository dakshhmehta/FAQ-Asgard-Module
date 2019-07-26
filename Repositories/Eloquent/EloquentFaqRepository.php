<?php

namespace Modules\Faq\Repositories\Eloquent;

use Modules\Faq\Repositories\FaqRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentFaqRepository extends EloquentBaseRepository implements FaqRepository
{
    public function create($data)
    {
        if (isset($data['heading_id'])) {
            $data['heading_id'] = $data['heading_id']->heading_id;
        }

        return parent::create($data);
    }
}
