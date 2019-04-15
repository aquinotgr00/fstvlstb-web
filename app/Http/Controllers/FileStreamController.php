<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tracklist;
use Response;
use Auth;
class FileStreamController extends Controller
{	
	protected $tracklist;

    public function __construct(Tracklist $tracklist){
    	$this->tracklist = $tracklist;
    }

    public function fileStream($id = null){

    	$tracklist = $this->tracklist->whereNull('deleted_at');
    	if(!is_null($id)){
    		$tracklist->where('id',$id);
    	}
    	$stream = $tracklist->first();
    	$audio = $this->streamFilter($stream);
    	$this->streamCounter($stream);
    	// $file = public_path(). '/'.$audio;
        $file = \Storage::disk('s3')->get($audio);
    	return response()->file($file, ['Content-Type' => 'audio/mpeg']);
    }

    private function streamCounter($stream){
    	$this->tracklist->where('id',$stream->id)->update([
    		'counter'=>$stream->counter +1,
    		]);
    }

    private function streamFilter($stream){
    	$audio = $stream->preview;
    	if(Auth::guard('account')->check()){
    		$audio = $stream->content;
    	}
    	return $audio;
    }
}
