<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracklist extends Model
{
    
    function getListStreamDownload(){

    	return $this->whereNULL('tracklists.deleted_at')
    				->leftjoin('files','files.tracklist_id','=','files.id')
    				->select('tracklists.*','files.counter as download')
    				->get();
    }
}
