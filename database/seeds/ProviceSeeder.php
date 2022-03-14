<?php

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->delete();
        DB::table('provinces')->insert([
           ["name"=> "beirut"],
           ["name"=> "mount lebanon"],
           ["name"=> "kesrawan al-fotouh-jbeil"],
            ["name"=> "north"],
            ["name"=> "akkar"],
            ["name"=> "bekaa"],
            ["name"=> "baalbek-hermel"],
            ["name"=> "south"],
            ["name"=> "al, nabatiyyyeh"]

        ]);


     /* $Provinces = [
            ['name'=> 'beirut'],
            ['name'=> 'mount lebanon'],
            ['name'=> 'kesrawan al-fotouh-jbeil'],
            ['name'=> 'north'],
            ['name'=> 'akkar'],
            ['name'=> 'bekaa'],
            ['name'=> 'baalbek-hermel'],
            ['name'=> 'south'],
            ['name'=> 'al,nabatiyyyeh'],
        ];

        foreach ($Provinces as $V_pro) {
          Province::create(['name' => $V_pro]);
        }*/
    }
}
