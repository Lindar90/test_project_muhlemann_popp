<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 4/5/18
 * Time: 17:19
 */

namespace App\Services\Users;

use App\User;
use Carbon\Carbon;

class Importer
{
    /**
     * @var ReaderInterface
     */
    protected $reader;

    /**
     * Import constructor.
     * @param ReaderInterface $reader
     */
    public function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function import(string $file)
    {
        foreach ($this->reader->getItems($file) as $item) {
            try {
                $item['birthdate'] = Carbon::createFromFormat('d.m.Y', $item['birthdate'])
                    ->toDateString();
                User::create($item);
            } catch (\Exception $e) {
                $this->processFailedItem($item, $e);
            }
        }
    }

    protected function processFailedItem($item, $e)
    {
        //TODO
    }
}