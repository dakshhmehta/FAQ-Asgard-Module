<?php

namespace Modules\Faq\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Faq\Entities\FaqHeading;

class Faq extends Model
{
    use Translatable;

    protected $table = 'faq__faqs';
    public $translatedAttributes = [];
    protected $fillable = ['question', 'answer', 'heading_id'];

    protected $perPage = 3;

    public function heading()
    {
    	return $this->belongsTo(FaqHeading::class, 'heading_id');
    }

    public function getHeadingLabelAttribute($value)
    {
    	return $this->heading->label;
    }
}
