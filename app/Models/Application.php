<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    protected $guarded =[];


    public function position(){

        return $this -> belongsTo(Position::class);
    }


    public function user(){

        return $this -> belongsTo(User::class);
    }


}
