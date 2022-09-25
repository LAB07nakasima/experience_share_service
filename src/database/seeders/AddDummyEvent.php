<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Calendar;

class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[   'id' => '1',
                'user_id' => '3',
                'schedule'=>'Demo Event-1', 'start_date'=>'2022-07-11', 'end_date'=>'2022-07-12'],
        	[
                'id' => '3',
                'user_id' => '2',
                'schedule'=>'DemoEvent-2',        'start_date'=>'2022-09-11', 'end_date'=>'2022-09-13'
            ],
        	[   'id' => '2',
                'user_id' => '1',
                'schedule'=>'Demo Event-3', 'start_date'=>'2022-11-14', 'end_date'=>'2022-11-14'
            ],
        	[   'id' => '4',
                'user_id' => '4',
                'schedule'=>'Demo Event-3', 'start_date'=>'2022-12-17', 'end_date'=>'2022-12-17'
            ],
        ];
        foreach ($data as $key => $value) {
        	Calendar::create($value);
        }
    }
}
