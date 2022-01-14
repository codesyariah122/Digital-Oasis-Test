<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Employee;

class FirstEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first_employee = new Employee;
        $first_employee->name = "richard stallman";
        $first_employee->email = "stallman@stallman.org";
        $first_employee->gender = "male";
        $first_employee->nip = rand(0,200000);
        $first_employee->hoby = "tenis meja";
        $first_employee->photo = null;
        $first_employee->save();
        $this->command->info("User admin created successfully");
    }
}
