<?php namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect, Input;

class ArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('admin.article.index')->withArticle(Article::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('admin.article.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:pages|max:255',
            'content' => 'required',
            'orderby' => 'required',
            'type' => 'required',
        ]);

        $article = new Article();
        $article->title = Input::get('title');
        $article->content = Input::get('content');
        $article->orderby = Input::get('orderby');
       $article->type = Input::get('type');
        if ($article->save()) {
            return Redirect::to(myAdminUrl());
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return view('admin.article.edit')->withArticle(Article::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function update(Request  $request,$id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
            #todo ??
        if (Article::where('id', $id)->update(Input::except(['_method', '_token','whatisadmin/articles/'.$id]))) {
            return Redirect::to(myAdminUrl().'/articles');
        } else {
            return Redirect::back()->withInput()->withErrors('更新失败！');
        }
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
