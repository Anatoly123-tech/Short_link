<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'code', 'url', 'click'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function clicklinks()
    {
        return $this->hasMany(ClickLink::class);
    }
    public static function generateCode()
    {
        return Str::random(6);
    }
}
