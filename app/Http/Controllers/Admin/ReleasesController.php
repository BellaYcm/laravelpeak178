<?php namespace App\Http\Controllers\Admin;

use App\Release;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Qiniu\Storage\UploadManager;
use Qiniu\Auth;

use Illuminate\Http\Request;

use Redirect, Input;

class ReleasesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('admin.release.index')->withRelease(Release::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('admin.release.create');
	}
    public function test()
    {
        echo 123444;exit;
        return view('admin.release.create');
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
            'article_number' => 'required',
            'contents' => 'required',
            'type' => 'required',
        ]);
        if($request->hasFile('uploadFile')){
            $file = Input::file('uploadFile');
            $uploadDir = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/storage/uploadImage/";
            $file->move($uploadDir,$file->getClientOriginalName());
            $picDir= $uploadDir . $file->getClientOriginalName();
            $accessKey = 'gpeL3jnWKNE9ypu1mnnTT2l6gwDim1CvbUvaHfWp';
            $secretKey = '8CCDbzrs0OFRI0okeW3gwe81niBGOK1qJizd_NyY';
            $auth = new Auth($accessKey, $secretKey);

            $bucket = 'aj-release';
            $token = $auth->uploadToken($bucket);
            $uploadMgr = New UploadManager();

            list($ret, $err) = $uploadMgr->putFile($token, null, $picDir);
            if ( $err !== null )
            {
                throw new Exception($err->Err, $err->Code);
            }
             else {
                 $imageQiniu="http://7xi41c.com1.z0.glb.clouddn.com/".$ret["key"];
            }
        }
        else{
            throw new Exception("no image", 500);
        }
        $release = new Release();
        $release->title = Input::get('title');
        $release->article_number = Input::get('article_number');
        $release->contents = Input::get('contents');
        $release->image = $imageQiniu;
        $release->type = Input::get('type');
        $release->date = Input::get('date');                                                                       
        $release->timestamp = strtotime($release->date);
        if ($release->save()) {
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
        return view('admin.release.edit')->withRelease(Release::find($id));
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
            'title' => 'required|unique:pages|max:255',
            'article_number' => 'required',
            'contents' => 'required',
            'type' => 'required',
        ]);
        if($request->hasFile('uploadFile')){
            $file = Input::file('uploadFile');
            $uploadDir = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/storage/uploadImage/";
            $file->move($uploadDir,$file->getClientOriginalName());
            $picDir= $uploadDir . $file->getClientOriginalName();
            $accessKey = 'gpeL3jnWKNE9ypu1mnnTT2l6gwDim1CvbUvaHfWp';
            $secretKey = '8CCDbzrs0OFRI0okeW3gwe81niBGOK1qJizd_NyY';
            $auth = new Auth($accessKey, $secretKey);
            $bucket = 'aj-release';
            $token = $auth->uploadToken($bucket);
            $uploadMgr = New UploadManager();

            list($ret, $err) = $uploadMgr->putFile($token, null, $picDir);
            if ( $err !== null )
            {
                throw new Exception($err->Err, $err->Code);
            }
            else {
                $imageQiniu="http://7xi41c.com1.z0.glb.clouddn.com/".$ret["key"];
                Release::where('id',$id)->update(['image'=>$imageQiniu]);
            }
        }
        $date=Input::get("date");
        if(!empty($date)){
            Release::where('id',$id)->update(['date'=>$date,'timestamp'=>strtotime($date)]);
        }
        if( (Release::where('id', $id)->update(Input::except(['_method', '_token','uploadFile','timestamp','date']))) || !empty($date) ){
            return Redirect::to(myAdminUrl().'/releases');
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
