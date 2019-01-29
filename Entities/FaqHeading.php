<?php

namespace Modules\Faq\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class FaqHeading extends Model
{
    use MediaRelation;

    protected $table = 'faq__faqheadings';
    protected $fillable = ['label'];

    public function getThumbnailAttribute()
    {
        $thumb = $this->files()->first();
        if (! $thumb) {
            return '';
        }

        return '<img src="'.$thumb->getThumbnail('mediumThumb').'" />';
    }
}
