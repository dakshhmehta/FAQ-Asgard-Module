<?php

namespace Modules\Faq\Policies;

class FaqHeadingPolicy
{
	public function addFaq($user, $model)
	{
		return rand(0, 1) == 1;
	}
}