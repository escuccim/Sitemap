<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 1/14/2017
 * Time: 11:05 AM
 */

namespace Escuccim\Sitemap\Http\Controllers;

use Illuminate\Http\Request;
use Escuccim\Sitemap\Models\Sitemap;
use Escuccim\Sitemap\Models\Page;
use Escuccim\Sitemap\Models\Subdomain;
use Escuccim\Sitemap\Models\SiteMapImage;
use Escuccim\Sitemap\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function __construct(){
        $this->middleware(config('cv.admin_middleware'))->except(['index', 'blog', 'pages', 'labels', 'records', 'sitemapIndex']);
    }

    /**
     * Sitemap admin - list of static pages
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function listPages(){
        $pages = Page::get();
        $subdomains = Subdomain::all();
        $sitemaps = Sitemap::all();
        return view('escuccim::sitemap.list', compact('pages', 'subdomains', 'sitemaps'));
    }

    /**
     * Show blank form to add a new page to the sitemap
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create(){
        $changefreq = Page::listChangefreq();
        $page = new Page();

        return view('escuccim::sitemap.create', compact('languages', 'changefreq', 'page'));
    }

    /**
     * Accept and validate a request for a new page, add it to the DB, redirect to list of pages
     *
     * @param PageRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(PageRequest $request){
        $page = Page::create($request->all());

        return redirect('sitemapadmin');
    }

    /**
     * Display an edit form for the page specified
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        // get the page
        $page = Page::where('id', $id)->first();
        $changefreq = Page::listChangefreq();

        return view('escuccim::sitemap.edit', compact('page', 'changefreq'));
    }

    /**
     * Update the page
     * @param $id
     * @param PageRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, PageRequest $request){
        // update the page
        $page = Page::where('id', $id)->first();
        $page->update($request->all());
        return redirect('sitemapadmin');
    }

    /**
     * Delete a page
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id){
        $results = ['message' => 'Success'];

        $page = Page::findOrFail($id);
        $page->destroy($id);
        $results = ['message' => 'Success'];
        return response($results, 200);
    }

    /**
     * Admin for sitemap images
     */
    public function editImage($id){
        $image = SiteMapImage::where('id', $id)->first();
        return view('escuccim::sitemap.editImage', compact('image'));
    }

    public function updateImage($id, Request $request){
        $image = SiteMapImage::where('id', $id)->first();
        $image->update($request->all());
        return redirect('sitemapadmin/' . $image->page_id . '/edit');
    }

    public function destroyImage($id){
        $image = SiteMapImage::where('id', $id)->first();
        $pageID = $image->page_id;
        SiteMapImage::destroy($id);
        return redirect('sitemapadmin/' . $pageID . '/edit');
    }

    public function addImage($page){
        $image = new SiteMapImage();
        $image->page_id = $page;
        return view('escuccim::sitemap.addImage', compact('image'));
    }

    public function storeImage($page, Request $request){
        // validate the form
        $this->validate($request, [
            'uri' => 'required',
            'title' => 'required',
            'caption' => 'required',
        ]);

        // store the image
        $image = SiteMapImage::create($request->all());

        // redirect back to page
        return redirect('sitemapadmin/' . $page . '/edit');
    }

    /**
     * Admin for managing subdomains
     */
    public function createSubdomain(){
        return view('escuccim::sitemap.addDomain');
    }

    public function storeSubdomain(Request $request){
        // validation removed because it causes problems if people don't want to assign languages
        // store the subdomain
        Subdomain::create($request->all());

        // redirect back
        return redirect('/sitemapadmin');
    }

    public function destroySubdomain($id){
        Subdomain::destroy($id);

        $results = ['message' => 'Success'];
        return response($results, 200);
    }

    public function editSubdomain($id){
        $subdomain = Subdomain::where('id', $id)->first();
        return view('escuccim::sitemap.editSubdomain', compact('subdomain'));
    }

    public function updateSubdomain($id, Request $request){
        $subdomain = Subdomain::where('id', $id)->first();
        $subdomain->update($request->all());

        return redirect('/sitemapadmin');
    }

    /**
     * Set a subdomain to be the default
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setDefault(Request $request){
        // set all values to 0
        Subdomain::where('default', 1)->update(['default' => 0]);

        // set the selected to default
        Subdomain::where('id', $request->default)->update(['default' => 1]);

        // redirect back
        return redirect('/sitemapadmin');
    }

    /**
     * Section for Sitemap index admin,
     */
    public function createSitemap(){
        $sitemap = new Sitemap();
        return view('escuccim::sitemapindex.create', compact('sitemap'));
    }

    public function storeSitemap(Request $request){
        // validate
        $this->validate($request, [
            'uri' => 'required',
        ]);

        // store
        Sitemap::create($request->all());

        // redirect
        return redirect('/sitemapadmin');
    }

    public function editSitemap($id){
        $sitemap = Sitemap::where('id', $id)->first();
        return view('escuccim::sitemapindex.edit', compact('sitemap'));
    }

    public function updateSitemap($id, Request $request){
        // validate
        $this->validate($request, [
            'uri' => 'required',
        ]);

        // store
        $sitemap = Sitemap::where('id', $id)->first();
        $sitemap->update($request->all());

        return redirect('/sitemapadmin');
    }

    public function destroySitemap($id){
        Sitemap::destroy($id);
        $results = ['message' => 'Success'];
        return response($results, 200);
    }

    public function sitemapIndex(){
        $sitemaps = Sitemap::get();

        // get date for pages
        $date = DB::table('pages')->orderBy('updated_at', 'desc')->first()->updated_at;
        $dataArray[] = [
            'uri' => '/sitemap/pages',
            'date' => $date,
        ];
        foreach($sitemaps as $sitemap){
            if($sitemap->model){
                $row = DB::table($sitemap->model)->orderBy('updated_at', 'desc')->first();
                $date = $row->updated_at;
            } else {
                $date = date('Y-m-01');
            }
           $dataArray[] = [
               'uri' => $sitemap->uri,
               'date' => $date,
           ];
        }
        $sitemaps = $dataArray;

        return view('escuccim::sitemapindex.sitemap', compact('sitemaps'));
    }

    /**
     * Generate the actual sitemaps for static pages, sitemap index and other pages have been removed to another controller to make this universal
     * @return \Illuminate\Http\Response
     */

    public function pages(){
        $pages = Page::get();

        // set the last modified date to the first of this month
        $lastMod = date("c", strtotime(date("Y-m-01 00:00:00")));
        return response()->view('escuccim::sitemap.pages', compact('lastMod', 'pages'))->header('Content-Type', 'text/xml');
    }


}