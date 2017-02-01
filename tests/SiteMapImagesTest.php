<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Escuccim\Sitemap\Models\SiteMapImage;
use Escuccim\Sitemap\Models\Page;

class SiteMapImagesTest extends BrowserKitTest
{
	use DatabaseTransactions;

    public function testAddImage()
    {
        // create an admin user to test with
        $user = factory(App\User::class)->create();
        $user->type = 1;

        // add a page to the DB
        $page = Page::create([
            'name'  => 'Ricksy Page',
            'uri'   => '/wubbalubbadubdubs',
            'priority' => 5,
            'changefreq' => 'always',
        ]);

        // go to that page, test validation and add an image
        $this->actingAs($user)
            ->visit('/sitemapadmin/' . $page->id . '/edit')
            ->see('Add Image');

        $this->actingAs($user)
            ->visit('/sitemapadmin/image/' . $page->id . '/create')
            ->type('Rick Rolling', 'caption')
            ->type('Squanching here', 'title')
            ->type('/squanchy.jpg', 'uri')
            ->press('Add Image')
            ->assertResponseOK()
            ->see('Rick Rolling');

        // make sure it appears in sitemap
        $this->visit('/sitemap/pages')
            ->see('squanchy.jpg');

        // make sure it is in the DB
        $this->seeInDatabase('sitemapimages', [
            'caption' => 'Rick Rolling',
        ]);
    }

    public function testEditSubdomain(){
        // create an admin user to test with
        $user = factory(App\User::class)->create();
        $user->type = 1;

        // add a page to the DB
        $page = Page::create([
            'name'  => 'Ricksy Page',
            'uri'   => '/wubbalubbadubdubs',
            'priority' => 5,
            'changefreq' => 'always',
        ]);

        // add an image to the DB
        $image = SiteMapImage::create([
            'caption'   => 'Morty-tastic',
            'title'     => 'Birdperson',
            'uri'       => '/images/gearhead.jpg',
            'page_id'   => $page->id,
        ]);

        // make sure it is in the DB
        $this->seeInDatabase('sitemapimages', [
            'uri' => '/images/gearhead.jpg',
        ]);

        // edit it
        $this->actingAs($user)
            ->visit('/sitemapadmin/image/' . $image->id . '/edit')
            ->assertResponseOk()
            ->see('Birdperson')
            ->type('/jerry/douche.jpg', 'uri')
            ->type('Horse Surgeon of the Year', 'caption')
            ->press('Edit Image')
            ->assertResponseOk()
            ->see('Horse Surgeon of the Year');

        // make sure it is in the DB
        $this->seeInDatabase('sitemapimages', [
            'caption' => 'Horse Surgeon of the Year',
        ]);

        // make sure it appears in sitemap
        $this->visit('/sitemap/pages')
            ->see('Horse Surgeon of the Year');
    }
}
