<?php

namespace Modules\Faq\Table;

use Modules\Faq\Repositories\FaqHeadingRepository;
use Modules\Rarv\Button\Button;
use Modules\Rarv\Table\Table;

class FaqHeadingTable extends Table
{
    protected $repository = FaqHeadingRepository::class;

    protected $columns = [
        'label'
    ];

    public function prepareLinks()
    {
    	parent::prepareLinks();

    	$url = route('admin.faq.faq.create').'?heading_id=##id##';
    	$addFaqBtn = new Button('Add FAQ', $url);
        
        // Its math x-axis value, lower the value to move to left side, 
        // and higher the value to move to left. 
        // Note: DeleteButton weight is 100.
        $addFaqBtn->weight=-1; 

    	$this->addLink($addFaqBtn);
    }
}
