<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tasks;
use App\Clients;
class AddTasks extends Model
{
    // Table name
    protected $table = 'clients';
    // Timestamps
    public $timestamps = true;

    public function tasks()
    {
        return $this->hasMany(Tasks::class, 'client_id', 'id');
    }
}
