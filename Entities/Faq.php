<?php

namespace Modules\Faq\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Faq\Entities\FaqHeading;
use Spatie\Activitylog\Traits\LogsActivity;

class Faq extends Model
{
    use Translatable, LogsActivity;

    protected $table = 'faq__faqs';
    public $translatedAttributes = [];
    protected $fillable = ['question', 'answer', 'heading_id'];

    protected static $logAttributes = ['question', 'answer', 'heading_id'];

    protected $perPage = 3;

    public function heading()
    {
        return $this->belongsTo(FaqHeading::class, 'heading_id');
    }
}
