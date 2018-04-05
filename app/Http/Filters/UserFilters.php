<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 2/8/18
 * Time: 23:09
 */

namespace App\Http\Filters;

use App\Filters\ProductFilters\BrandFilter;
use App\Filters\ProductFilters\ColorFilter;
use App\Filters\ProductFilters\SizeFilter;
use App\Http\Filters\UserFilters\FirstnameFilter;
use App\Http\Filters\UserFilters\LastnameFilter;

class UserFilters extends Filter
{
    protected $filters = [
        LastnameFilter::class,
        FirstnameFilter::class,
    ];
}