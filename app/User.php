<?php

namespace App;

use App\Http\Filters\UserFilters;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $guarded = [];

    public function scopeFilter($query, UserFilters $filters)
    {
        return $filters->apply($query);
    }
}
