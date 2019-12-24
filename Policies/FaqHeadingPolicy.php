<?php

namespace Modules\Faq\Policies;

class FaqHeadingPolicy
{
    public function addFaq($user, $model)
    {
        return ($model->id % 2) == 0;
    }
}
