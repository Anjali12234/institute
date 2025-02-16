<?php

namespace Database\Seeders;

use App\ExecutesSql;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    use ExecutesSql;

    public function run()
    {
        $this->executeSqlFile(storage_path('sql/Address/address.sql'));
    }
}
