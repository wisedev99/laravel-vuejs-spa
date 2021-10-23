<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Clients;

class Tasks extends Model
{
    // Table name
    protected $table = 'tasks';
    // Timestamps
    public $timestamps = true;

    public function clients()
    {
        return $this->belongsTo(Clients::class, 'client_id', 'id');
    }
}
