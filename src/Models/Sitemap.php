<?php

namespace Escuccim\Sitemap\Models;

use Illuminate\Database\Eloquent\Model;

class Sitemap extends Model
{
    // what fields are mass fillable
    protected $fillable = [
        'uri',
    ];

}
