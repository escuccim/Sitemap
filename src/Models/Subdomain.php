<?php

namespace Escuccim\Sitemap\Models;

use Illuminate\Database\Eloquent\Model;

class Subdomain extends Model
{
    protected $table = "subdomains";

    // what fields are mass fillable
    protected $fillable = [
        'subdomain',
        'language',
        'default',
    ];

    // return the default subdomain, used in generating sitemap
    public static function getDefault(){
        return Subdomain::where('default', 1)->first();
    }
}
