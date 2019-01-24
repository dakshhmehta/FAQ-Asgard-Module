<?php

namespace Modules\Faq\Repositories\Cache;

use Modules\Faq\Repositories\FaqHeadingRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFaqHeadingDecorator extends BaseCacheDecorator implements FaqHeadingRepository
{
    public function __construct(FaqHeadingRepository $faqheading)
    {
        parent::__construct();
        $this->entityName = 'faq.faqheadings';
        $this->repository = $faqheading;
    }
}
