<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracklist extends Model
{
    
    function getListStreamDownload(){

    	return $this->whereNULL('tracklists.deleted_at')
    				->where('tracklists.status','active')
    				->leftjoin('files','files.tracklist_id','=','tracklists.id')
    				->select('tracklists.*','files.counter as download')
    				->get();
    }
}
