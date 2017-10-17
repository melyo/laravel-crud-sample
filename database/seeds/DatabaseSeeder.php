<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Tables to be tuncated.
     *
     * @var array
     */
     protected $toTruncate = [
        'products'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # truncates tables before seeding
        foreach ($this->toTruncate as $table) {
            DB::table($table)->delete();
        }

        factory(App\Models\Product::class, 25)->create();
    }
}
