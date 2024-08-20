<?php

namespace App\Models;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $table = "tasks";
    protected  $guarded = [];


    public function project()
    {
        return  $this->belongsTo(Project::class);
    }
    public function creator()
    {
        return  $this->belongsTo(User::class, 'create_by');
    }
    public function asign_to()
    {
        return  $this->belongsTo(User::class, 'user_id');
    }


}
