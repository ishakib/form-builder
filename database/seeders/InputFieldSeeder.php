<?php
namespace Database\Seeders;

use App\Models\InputField;
use Illuminate\Database\Seeder;

class InputFieldSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $field_types = [
            ['name' => 'short_answer'],
            ['name' => 'long_answer'],
            ['name' => 'checkbox'],
            ['name' => 'multiple_choice'],
            ['name' => 'dropdown'],
            ['name' => 'time'],
            ['name' => 'date'],
        ];

        InputField::query()->insert($field_types);
    }
}
