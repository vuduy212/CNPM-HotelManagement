<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //first
        $v1_101 = Room::updateOrCreate([
            'room_name' => 'v1_101',
            'description' => 'This is VIP Room for one people - 101',
            'category_id' => '1',
        ]);

        $v1_102 = Room::updateOrCreate([
            'room_name' => 'v1_102',
            'description' => 'This is VIP Room for one people - 102',
            'category_id' => '1',
        ]);

        $v1_103 = Room::updateOrCreate([
            'room_name' => 'v1_103',
            'description' => 'This is VIP Room for one people - 103',
            'category_id' => '1',
        ]);

        $v2_201 = Room::updateOrCreate([
            'room_name' => 'v2_201',
            'description' => 'This is VIP Room for 2 people - 201',
            'category_id' => '2',
        ]);

        $v2_202 = Room::updateOrCreate([
            'room_name' => 'v2_202',
            'description' => 'This is VIP Room for 2 people - 202',
            'category_id' => '2',
        ]);

        $v2_203 = Room::updateOrCreate([
            'room_name' => 'v2_203',
            'description' => 'This is VIP Room for 2 people - 203',
            'category_id' => '2',
        ]);

        $v4_301 = Room::updateOrCreate([
            'room_name' => 'v4_301',
            'description' => 'This is VIP Room for 4 people - 301',
            'category_id' => '3',
        ]);

        $v4_302 = Room::updateOrCreate([
            'room_name' => 'v4_302',
            'description' => 'This is VIP Room for 4 people - 302',
            'category_id' => '3',
        ]);

        $v4_303 = Room::updateOrCreate([
            'room_name' => 'v4_303',
            'description' => 'This is VIP Room for 4 people - 303',
            'category_id' => '3',
        ]);

        $n1_111 = Room::updateOrCreate([
            'room_name' => 'n1_111',
            'description' => 'This is Normal Room for one people - 111',
            'category_id' => '4',
        ]);

        $n1_112 = Room::updateOrCreate([
            'room_name' => 'n1_112',
            'description' => 'This is Normal Room for one people - 112',
            'category_id' => '4',
        ]);

        $n1_113 = Room::updateOrCreate([
            'room_name' => 'n1_113',
            'description' => 'This is Normal Room for one people - 113',
            'category_id' => '4',
        ]);

        $n2_211 = Room::updateOrCreate([
            'room_name' => 'n2_211',
            'description' => 'This is Normal Room for 2 people - 211',
            'category_id' => '5',
        ]);

        $n2_212 = Room::updateOrCreate([
            'room_name' => 'n2_212',
            'description' => 'This is Normal Room for 2 people - 212',
            'category_id' => '5',
        ]);

        $n2_213 = Room::updateOrCreate([
            'room_name' => 'n2_213',
            'description' => 'This is Normal Room for 2 people - 213',
            'category_id' => '5',
        ]);

        $n4_311 = Room::updateOrCreate([
            'room_name' => 'n4_311',
            'description' => 'This is Normal Room for 4 people - 311',
            'category_id' => '6',
        ]);

        $n4_312 = Room::updateOrCreate([
            'room_name' => 'n4_312',
            'description' => 'This is Normal Room for 4 people - 312',
            'category_id' => '6',
        ]);

        $n4_313 = Room::updateOrCreate([
            'room_name' => 'n4_313',
            'description' => 'This is Normal Room for 4 people - 313',
            'category_id' => '6',
        ]);
    }
}
