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

	// return available language options, no need to put this in DB, won't change too much
	public static function listLanguages(){
		return [
				'English' => 'en',
				'French' => 'fr',
		];
	}
	
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

	public function images(){
        return $this->hasMany('\Escuccim\Sitemap\Models\SiteMapImage');
    }
}
