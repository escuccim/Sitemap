<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Escuccim\Sitemap\Models\Subdomain;

class SiteMapSubdomainsTest extends BrowserKitTest
{
	use DatabaseTransactions;

    public function testAddSubdomain()
    {
        // create an admin user to test with
        $user = factory(App\User::class)->create();
        $user->type = 1;

        // add a page
        $this->actingAs($user)
            ->visit('/sitemapadmin/subdomain/create')
            ->type('foobar', 'subdomain')
            ->type('zz', 'language')
            ->press('Add Subdomain')
            ->assertResponseOk()
            ->see('foobar');

        // make sure it appears in sitemap
        $this->visit('/sitemap/pages')
            ->see('foobar');

        // make sure it is in the DB
        $this->seeInDatabase('subdomains', [
            'subdomain' => 'foobar',
        ]);
    }

    public function testEditSubdomain(){
        // create an admin user to test with
        $user = factory(App\User::class)->create();
        $user->type = 1;

        // add a page to the DB
        $domain = Subdomain::create([
            'subdomain'   => 'yogabbagabba',
            'language'    => 'zz',
        ]);

        // make sure it is in the DB
        $this->seeInDatabase('subdomains', [
            'subdomain' => 'yogabbagabba',
        ]);

        // edit it
        $this->actingAs($user)
            ->visit('/sitemapadmin/subdomain/' . $domain->id)
            ->assertResponseOk()
            ->see('yogabbagabba')
            ->type('gabbagabbaheyhey', 'subdomain')
            ->press('Edit Subdomain')
            ->assertResponseOk()
            ->see('gabbagabbaheyhey');

        // make sure it is in the DB
        $this->seeInDatabase('subdomains', [
            'subdomain' => 'gabbagabbaheyhey',
        ]);

        // make sure it appears in sitemap
        $this->visit('/sitemap/pages')
            ->see('gabbagabbaheyhey');
    }
}
