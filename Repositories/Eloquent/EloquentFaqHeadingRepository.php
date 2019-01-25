<?php

namespace Modules\Faq\Repositories\Eloquent;

use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Faq\Repositories\FaqHeadingRepository;

class EloquentFaqHeadingRepository extends EloquentBaseRepository implements FaqHeadingRepository
{
    public function create($data)
    {
        $model = parent::create($data);

        if (isset($data['image'])) {
            $model->filesByZone('image')->sync([
            	$data['image'] => ['zone' => 'image'],
            ]);
        }

        return $model;
    }

    public function update($model, $data)
    {
        $model = parent::update($model, $data);

        if (isset($data['image'])) {
            $model->filesByZone('image')->sync([
            	$data['image'] => ['zone' => 'image'],
            ]);
        }
        else {
        	$model->filesByZone('image')->sync([]); // Clear
        }

        return $model;
    }
}
