<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 4/5/18
 * Time: 17:20
 */

namespace App\Services\Users;


interface ReaderInterface
{
    public function getItems(string $file): \Generator;
}