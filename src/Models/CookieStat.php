<?php

namespace ITHilbert\CookieDisclaimer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookieStat extends Model
{
    use HasFactory;
    protected $table = 'cookie_statistics';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = true;
}
