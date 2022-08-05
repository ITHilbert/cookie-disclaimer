<?php

namespace ITHilbert\CookieDisclaimer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookieScript extends Model
{
    use HasFactory;
    protected $table = 'cookie_scripte';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = true;
}
