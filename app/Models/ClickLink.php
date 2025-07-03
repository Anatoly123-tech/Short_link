<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClickLink extends Model
{
    use HasFactory;
    protected $fillable = ['link_id', 'ip', 'clicked'];
    public $timestamps = false;
    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
