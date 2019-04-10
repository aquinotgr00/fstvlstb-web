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

    public function downloadFile(){
	   $file = $this->file->find(1);
	   $this->counterDownload($file);
	   $path = public_path(). '/'. $file->contents;
	   return response()->download($path, $file
	            ->contents, ['Content-Type' => 'zip']);
	}

	public function counterDownload($file): void
	{	
		$this->file->where('id',$file->id)->update([
			'counter'=>$file->counter+1
			]);
	}

	public function imageDownload(){

		$path = public_path(). '/'. Auth::guard('account')->user()->images;
	   	
	   	return response()->download($path, sprintf("%06d", Auth::guard('account')->user()->id)'.jpg', ['Content-Type' => 'jpg']);
	}
}
