<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 1/14/2017
 * Time: 11:05 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Tag;
use App\Page;
use App\Record;
use App\Subdomain;
use App\SiteMapImage;
use App\Http\Requests\PageRequest;

class SiteMap extends Controller
{
    public function __construct(){
        $this->middleware('admin')->except(['index', 'blog', 'pages', 'labels', 'records']);
    }

    /**
     * Sitemap admin - list of static pages
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function list(){
        $pages = Page::get();
        $subdomains = Subdomain::all();
        return view('sitemap.list', compact('pages', 'subdomains'));
    }

    /**
     * Show blank form to add a new page to the sitemap
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create(){
        $changefreq = Page::listChangefreq();
        $page = new Page();

        return view('sitemap.create', compact('languages', 'changefreq', 'page'));
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

    public function edit($id){
        // get the page
        $page = Page::where('id', $id)->first();
        $changefreq = Page::listChangefreq();

        return view('sitemap.edit', compact('page', 'changefreq'));
    }

    public function update($id, PageRequest $request){
        // update the page
        $page = Page::where('id', $id)->first();
        $page->update($request->all());
        return redirect('sitemapadmin');
    }

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
        return view('sitemap.editImage', compact('image'));
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
        return view('sitemap.addImage', compact('image'));
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
     * Subdomain Admin
     */
    public function createSubdomain(){
        return view('sitemap.addDomain');
    }

    public function storeSubdomain(Request $request){
        // validate the form
        $this->validate($request, [
            'language' => 'required',
        ]);

        // store the subdomain
        Subdomain::create($request->all());

        // redirect back
        return redirect('/sitemapadmin');
    }

    public function setDefault(Request $request){
        // set all values to 0
        Subdomain::where('default', 1)->update(['default' => 0]);

        // set the selected to default
        Subdomain::where('id', $request->default)->update(['default' => 1]);

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
        return view('sitemap.editSubdomain', compact('subdomain'));
    }

    public function updateSubdomain($id, Request $request){
        // validate the form
        $this->validate($request, [
            'language' => 'required',
        ]);

        $subdomain = Subdomain::where('id', $id)->first();
        $subdomain->update($request->all());

        return redirect('/sitemapadmin');
    }

    /**
     * Generate the actual sitemaps for index, blog, labels and static pages
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $blog = Blog::latest('published_at')->published()->first();

        return response()->view('sitemap.sitemap', compact('blog'))->header('Content-Type', 'text/xml');
    }

    public function pages(){
        $pages = Page::get();

        // set the last modified date to the first of this month
        $lastMod = date("c", strtotime(date("Y-m-01 00:00:00")));
        return response()->view('sitemap.pages', compact('lastMod', 'pages'))->header('Content-Type', 'text/xml');
    }


}