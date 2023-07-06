<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class yourList extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'poster',
        'mId'
    ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
