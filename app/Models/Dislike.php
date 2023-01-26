<?php

namespace App\Models;

use App\Models\Draft;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    protected $guarded = [];
    protected $with = ['draft'];
    
    use HasFactory;

    public function draft()
    {
        return $this->belongsTo(Draft::class);
    }
}
