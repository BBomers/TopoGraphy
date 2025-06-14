<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = ['max_score', 'gehaalde_score', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
