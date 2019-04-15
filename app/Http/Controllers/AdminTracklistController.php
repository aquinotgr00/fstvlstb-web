<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tracklist;
use App\File;
use DataTables;

class AdminTracklistController extends Controller
{

	protected $tracklist;
	protected $file;
	public function __construct(Tracklist $tracklist,File $file)
	{	
		$this->middleware('auth');
		$this->tracklist = $tracklist;
	   	$this->file= $file;
	}

	 /**
	     * Show the application dashboard of tacklist page.
	     *
	     * @return \Illuminate\Contracts\Support\Renderable
	     */
	public function index()
	{

	   	return view('admin-page.tracklist');
	}

	   /**
	     * get list data from tracklist
	     *
	     * @return mixed
	     */
	public function listData(Request $request)
	{
	    	$data = $this->tracklist->query();
	    	return DataTables::eloquent($data)
					->order(function ($query) {
                        $query->orderBy('id', 'asc');
                	})
                	->setRowId('id')
                	->addColumn('action', function ($data) {
		                return '<a href="/admin/tracklist/edit/'.$data->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
		            })
                ->toJson();
	}
	public function updateTracklist(Request $request){
		$this->tracklist->where('id',$request->id)->update([
			'name'=>$request->name,
			'status'=>$request->status,
			'release_date'=>$request->release_date
			]);
		return Redirect()->back();
	}

	public function uploadTracklist(Request $request){
		$file = $request->file('audio');

   		$destinationPath = 'tracklist';
   		$filePath = $destinationPath.'/'.$file->getClientOriginalName();
       \Storage::disk('s3')->put($filePath, fopen($file->getRealPath().'/'.$file->getClientOriginalName(), 'r+'), [ 'visibility' => 'public','ContentType' => 'audio/mpeg'],'public');
       $this->tracklist->where('id',$request->id)->update([
       		'content'=>$filePath
       	]);
       return Redirect()->back();
	}

	public function uploadTracklistPreview(Request $request){
		$file = $request->file('audio');

   		$destinationPath = 'preview';
   		$filePath = $destinationPath.'/'.$file->getClientOriginalName();
       \Storage::disk('s3')->put($filePath, fopen($file->getRealPath().'/'.$file->getClientOriginalName(), 'r+'), [ 'visibility' => 'public','ContentType' => 'audio/mpeg'],'public');
       $this->tracklist->where('id',$request->id)->update([
       		'preview'=>$filePath
       	]);
       return Redirect()->back();
	}

	public function uploadTracklistZip(Request $request){
		$file = $request->file('audio');

   		$destinationPath = 'zip';
   		$filePath = $destinationPath.'/'.$file->getClientOriginalName();
       \Storage::disk('s3')->put($filePath, file_get_contents($file), [ 'visibility' => 'public','ContentType' => 'application/zip'],'public');
	       $zipfile= $this->file->where('tracklist_id',$request->id)->first();
	       if(empty($zipfile)){
	       	$this->file->insert([
	       		'name'=>'zipfile',
	       		'contents'=>$filePath,
	       		'tracklist_id'=>$request->id
	       	]);
	       	return Redirect()->back();
	       }
	       $this->file->where('tracklist_id',$request->id)->update([
	       		'contents'=>$filePath
	       	]);
       return Redirect()->back();
	}

	public function editForm($id){
		$tracklist  = $this->tracklist->where('id',$id)->first();
		return view('admin-page.tracklist-detail',compact('tracklist'));
	}
}
