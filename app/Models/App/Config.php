<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'configs';

    protected $fillable = [
      'index', 'value'
    ];
}
