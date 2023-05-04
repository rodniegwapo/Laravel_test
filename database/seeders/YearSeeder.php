<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $years = ['2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2009', '2010'];

        foreach ($years as $year) {
            Year::create(['year' => $year]);
        }
    }
}
