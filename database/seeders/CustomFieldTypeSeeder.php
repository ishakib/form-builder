<?php
namespace Database\Seeders;

use App\Models\CustomFieldType;
use Illuminate\Database\Seeder;

class CustomFieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $field_types = [
            ['name' => 'text'],
            ['name' => 'textarea'],
            ['name' => 'radio'],
            ['name' => 'select'],
            ['name' => 'date'],
            ['name' => 'number'],
        ];

        CustomFieldType::query()->insert($field_types);
    }
}
