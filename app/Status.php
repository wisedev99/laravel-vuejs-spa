<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Tasks;

class Status extends Tasks
{
    // Table name
       protected $table = 'tasks';
       // Timestamps
       public $timestamps = true;
    //
//        public function clients()
//        {
//            return $this->belongsTo(Clients::class, 'client_id', 'id');
//        }
}
