<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
   
    public function create(string $task): bool
    {
        return DB::table('tasks')->insert([
            'task' => $task,
            
        ]);
    }
}
