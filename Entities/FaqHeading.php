<?php

namespace Modules\Faq\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class FaqHeading extends Model
{
    protected $table = 'faq__faqheadings';
    protected $fillable = ['label'];
}
