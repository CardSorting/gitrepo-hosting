<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostedRepository extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'unique_id',
        'path',
        'original_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
