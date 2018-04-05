<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 2/8/18
 * Time: 23:11
 */

namespace App\Http\Filters\UserFilters;


use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FirstnameFilter
{
    /**
     * @var Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(Builder $builder, Closure $next)
    {
        if ($firstname = $this->request->input('firstname')) {
            $builder->where('firstname', $firstname);
        }

        return $next($builder);
    }
}