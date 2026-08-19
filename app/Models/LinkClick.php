<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkClick extends Model
{
    protected $fillable = [
        'link_id',
        'ip_address',
        'user_agent',
        'perangkat',
        'browser',
        'sistem_operasi',
        'negara',
        'referer',
    ];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
