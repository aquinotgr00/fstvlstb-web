<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Auth;

class FileDownloadController extends Controller
{
	protected $file;

    public function __construct(File $files){
    	$this->middleware('auth:account');
    	$this->file = $files;
    }

    public function downloadFile(Request $request){
	   
	   if(empty($request->id)){
	   	$file = $this->file->first();
	   }else{
	   	$file = $this->file->where('tracklist_id',$request->id)->first();
	   }
	   $this->counterDownload($file);
	   
	   $path = \Storage::disk('s3')->get($file->contents);
	   return response($path,200,['Content-Type' => 'application/zip']);
	}

	public function counterDownload($file): void
	{	
		$this->file->where('id',$file->id)->update([
			'counter'=>$file->counter+1
			]);
	}

	public function imageDownload(){

		// $path = public_path(). '/'. Auth::guard('account')->user()->images;
	   	$path = \Storage::disk('s3')->get(Auth::guard('account')->user()->images);
	   	// return response($path,200,['Content-Type' => 'image/jpg','filename'=> sprintf("%06d", Auth::guard('account')->user()->id).'.jpg']);
	   	return response()->make($path, 200, ['Content-Type' => 'image/jpg','Content-Disposition' => 'attachment;filename= '.sprintf("%06d", Auth::guard('account')->user()->id).'.jpg']);
	}
}
