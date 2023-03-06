<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\UnitOfMeasure;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
/*        Company::factory(10)->create();
        User::factory(20)->create();
        Client::factory(20)->create();
        Invoice::factory(15)->create();
        InvoiceItem::factory(50)->create();*/
        UnitOfMeasure::factory(15)->create();

        $this->call([
            RoleAndPermissionSeeder::class,
        ]);
    }
}
