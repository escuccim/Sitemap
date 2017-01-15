<?php

namespace Escuccim\Sitemap\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	// what fields are mass fillable
	protected $fillable = [
			'name',
			'changefreq',
			'uri',
			'priority',
	];
	
	// return the possible values for change frequency
	public static function listChangefreq(){
		return [
			'always' => 'always',
			'hourly' => 'hourly',
			'daily' => 'daily',
			'weekly' => 'weekly',
			'monthly' => 'monthly',
			'yearly' => 'yearly',
		];
	}

	// relationship with sitemapimages
	public function images(){
        return $this->hasMany('\Escuccim\Sitemap\Models\SiteMapImage');
    }
}
