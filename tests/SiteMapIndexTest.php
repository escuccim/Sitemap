<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Escuccim\Sitemap\Models\Sitemap;

class SiteMapIndexTest extends BrowserKitTest
{
	use DatabaseTransactions;

    public function testAddIndex()
    {
        // create an admin user to test with
        $user = factory(App\User::class)->create();
        $user->type = 1;

        // test validation
        $this->actingAs($user)
            ->visit('/sitemapadmin/index/create')
            ->press('Add Index')
            ->see('The uri field is required.');

        // add a page
        $this->actingAs($user)
            ->visit('/sitemapadmin/index/create')
            ->type('/borkbork', 'uri')
            ->press('Add Index')
            ->assertResponseOk()
            ->see('/borkbork');

        // make sure it appears in sitemap
        $this->visit('/sitemap')
            ->see('/borkbork');

        // make sure it is in the DB
        $this->seeInDatabase('sitemaps', [
            'uri' => '/borkbork',
        ]);
    }

    public function testEditIndex(){
        // create an admin user to test with
        $user = factory(App\User::class)->create();
        $user->type = 1;

        // add a page to the DB
        $map = Sitemap::create([
            'uri'   => '/test-bork',
        ]);

        // make sure it is in the DB
        $this->seeInDatabase('sitemaps', [
            'uri' => '/test-bork',
        ]);

        // edit it
        $this->actingAs($user)
            ->visit('/sitemapadmin/index/' . $map->id)
            ->assertResponseOk()
            ->see('/test-bork')
            ->type('/borkborkbaz', 'uri')
            ->press('Edit Index')
            ->assertResponseOk()
            ->see('borkborkbaz');

        // make sure it is in the DB
        $this->seeInDatabase('sitemaps', [
            'uri' => '/borkborkbaz',
        ]);

        // make sure it appears in sitemap
        $this->visit('/sitemap')
            ->see('/borkborkbaz');
    }
}
