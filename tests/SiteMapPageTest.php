<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Escuccim\Sitemap\Models\Page;

class SiteMapPageTest extends BrowserKitTest
{
	use DatabaseTransactions;

    public function testPagesAppear(){
        // create an admin user to test with
        $user = factory(App\User::class)->create();
        $user->type = 1;

        $this->actingAs($user)
            ->visit('/sitemapadmin')
            ->assertResponseOk();

        $this->actingAs($user)
            ->visit('/sitemapadmin/create')
            ->assertResponseOk();

        $this->actingAs($user)
            ->visit('/sitemapadmin/index/create')
            ->assertResponseOk();

        $this->actingAs($user)
            ->visit('/sitemapadmin/subdomain/create')
            ->assertResponseOk();
    }

    public function testAddPage()
    {
        // create an admin user to test with
        $user = factory(App\User::class)->create();
        $user->type = 1;

        // test validation
        $this->actingAs($user)
            ->visit('/sitemapadmin/create')
            ->press('Add Page')
            ->see('The name field is required.');

        // add a page
        $this->actingAs($user)
            ->visit('/sitemapadmin/create')
            ->type('Test Page Foo', 'name')
            ->type('/testpage', 'uri')
            ->type('5', 'priority')
            ->press('Add Page')
            ->assertResponseOk()
            ->see('Test Page Foo');

        // make sure it appears in sitemap
        $this->visit('/sitemap/pages')
            ->see('/testpage');

        // make sure it is in the DB
        $this->seeInDatabase('pages', [
            'name' => 'Test Page Foo',
        ]);
    }

    public function testEditPage(){
        // create an admin user to test with
        $user = factory(App\User::class)->create();
        $user->type = 1;

        // add a page to the DB
        $page = Page::create([
            'name'  => 'Test Page Bork',
            'uri'   => '/test-bork',
            'priority' => 5,
            'changefreq' => 'always',
        ]);

        // make sure it is in the DB
        $this->seeInDatabase('pages', [
            'name' => 'Test Page Bork',
        ]);

        // edit it
        $this->actingAs($user)
            ->visit('/sitemapadmin/' . $page->id . '/edit')
            ->assertResponseOk()
            ->type('Test Page Yankee Doodle', 'name')
            ->type('/borkborkbaz', 'uri')
            ->press('Update Page')
            ->assertResponseOk()
            ->see('Test Page Yankee Doodle');

        // make sure it is in the DB
        $this->seeInDatabase('pages', [
            'name' => 'Test Page Yankee Doodle',
        ]);

        // make sure it appears in sitemap
        $this->visit('/sitemap/pages')
            ->see('/borkborkbaz');
    }
}
