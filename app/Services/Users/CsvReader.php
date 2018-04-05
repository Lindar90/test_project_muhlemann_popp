<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 4/5/18
 * Time: 17:22
 */

namespace App\Services\Users;

use League\Csv\Reader;


class CsvReader implements ReaderInterface
{
    public function getItems(string $file): \Generator
    {
        $reader = Reader::createFromPath($file, 'r');

        $reader->setHeaderOffset(0)->setDelimiter(';');

        $records = $reader->getRecords([
            'firstname',
            'lastname',
            'birthdate',
            'email',
            'home_city',
            'home_zip',
            'home_address',
            'phone',
            'company_name',
            'work_city',
            'work_address',
            'position',
            'cv',
        ]);

        foreach ($records as $offset => $record) {
            yield $record;
        }
    }
}
