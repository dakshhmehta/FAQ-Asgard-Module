<?php

namespace Modules\Faq\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider;
use Modules\Faq\Entities\FaqHeading;
use Modules\Faq\Policies\FaqHeadingPolicy;

class FaqPolicyServiceProvider extends AuthServiceProvider
{
	protected $policies = [
		FaqHeading::class => FaqHeadingPolicy::class,
	];

	public function boot()
	{
		$this->registerPolicies();
	}
}