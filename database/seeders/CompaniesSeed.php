// CompaniesSeed.php
<?php

use Illuminate\Database\Seeder;
use App\Models\Company as Company;

class CompaniesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      app\Models\Company::create([
            'name' => '\str_random(10)',
            'email' => 'teste@teste@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}