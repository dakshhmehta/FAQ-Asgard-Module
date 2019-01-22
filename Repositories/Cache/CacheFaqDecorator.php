<?php

namespace Modules\Faq\Repositories\Cache;

use Modules\Faq\Repositories\FaqRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFaqDecorator extends BaseCacheDecorator implements FaqRepository
{
    public function __construct(FaqRepository $faq)
    {
        parent::__construct();
        $this->entityName = 'faq.faqs';
        $this->repository = $faq;
    }
}
