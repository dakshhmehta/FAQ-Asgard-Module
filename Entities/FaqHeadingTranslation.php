<?php

namespace Modules\Faq\Entities;

use Illuminate\Database\Eloquent\Model;

class FaqHeadingTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'faq__faqheading_translations';
}
