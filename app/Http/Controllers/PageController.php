<?php namespace App\Http\Controllers;

use App\Page;

class PageController extends Controller {

    public function index()
    {
        return view('page')->withPages(Page::all());
    }
    public function show($id)
    {
        return view('pages.show')->withPage(Page::find($id));
    }

}