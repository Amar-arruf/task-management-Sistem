<?php

namespace Database\Seeders;

use DateInterval;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Schedule_Seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Jakarta');
        $today = new DateTime();
        $one_hour = strtotime('+1 hours');

        $tomorrow = $today->modify('+1 day')->format('Y-m-d H:i:s');
        $week = $today->modify('+7 day')->format('Y-m-d H:i:s');
        DB::table('schedule')->insert([
            ['title' => 'Fixing bug', 'start' => date('Y-m-d H:i:s'), 'end' => date('Y-m-d H:i:s', $one_hour)],
            ['title' => 'Develop Frontend', 'start' => date('Y-m-d H:i:s'), 'end' => $tomorrow],
            ['title' => 'Develop Backend', 'start' => date('Y-m-d H:i:s'), 'end' => $week],
        ]);
    }
}
