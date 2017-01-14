<?php

namespace Escuccim\Sitemap\Models;

use Illuminate\Database\Eloquent\Model;

class SiteMapImage extends Model
{
    protected $table = 'sitemapimages';

    // what fields are mass fillable
    protected $fillable = [
        'page_id',
        'uri',
        'caption',
        'title',
    ];

    public function page(){
        return $this->belongsTo('App\Page', 'page_id');
    }
}
