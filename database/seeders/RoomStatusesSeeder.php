<?php

namespace Database\Seeders;

use App\Models\RoomStatus;
use Illuminate\Database\Seeder;

class RoomStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //demo
        $v1_101_10_12_2021 = RoomStatus::updateOrCreate([
            'room_id' => '1',
            'status' => '0',
            'time' => '2021-12-10'
        ]);

        $v1_101_11_12_2021 = RoomStatus::updateOrCreate([
            'room_id' => '1',
            'status' => '0',
            'time' => '2021-12-11'
        ]);

        //ngay dau tien
        $v1_101_1 = RoomStatus::updateOrCreate([
            'room_id' => '1',
            'status' => '0',
            'time' => '2021-01-01'
        ]);

        $v2_201_1 = RoomStatus::updateOrCreate([
            'room_id' => '2',
            'status' => '1',
            'time' => '2021-01-01'
        ]);

        $v4_301_1 = RoomStatus::updateOrCreate([
            'room_id' => '3',
            'status' => '0',
            'time' => '2021-01-01'
        ]);

        $n1_111_1 = RoomStatus::updateOrCreate([
            'room_id' => '4',
            'status' => '1',
            'time' => '2021-01-01'
        ]);

        $n2_211_1 = RoomStatus::updateOrCreate([
            'room_id' => '5',
            'status' => '0',
            'time' => '2021-01-01'
        ]);

        $n4_311_1 = RoomStatus::updateOrCreate([
            'room_id' => '6',
            'status' => '1',
            'time' => '2021-01-01'
        ]);

        //ngay thu 2
        $v1_101_2 = RoomStatus::updateOrCreate([
            'room_id' => '1',
            'status' => '1',
            'time' => '2021-01-02'
        ]);

        $v2_201_2 = RoomStatus::updateOrCreate([
            'room_id' => '2',
            'status' => '0',
            'time' => '2021-01-02'
        ]);

        $v4_301_2 = RoomStatus::updateOrCreate([
            'room_id' => '3',
            'status' => '1',
            'time' => '2021-01-02'
        ]);

        $n1_111_2 = RoomStatus::updateOrCreate([
            'room_id' => '4',
            'status' => '0',
            'time' => '2021-01-02'
        ]);

        $n2_211_2 = RoomStatus::updateOrCreate([
            'room_id' => '5',
            'status' => '1',
            'time' => '2021-01-02'
        ]);

        $n4_311_2 = RoomStatus::updateOrCreate([
            'room_id' => '6',
            'status' => '0',
            'time' => '2021-01-02'
        ]);

        //ngay thu 3
        $v1_101_3 = RoomStatus::updateOrCreate([
            'room_id' => '1',
            'status' => '1',
            'time' => '2021-01-03'
        ]);

        $v2_201_3 = RoomStatus::updateOrCreate([
            'room_id' => '2',
            'status' => '1',
            'time' => '2021-01-03'
        ]);

        $v4_301_3 = RoomStatus::updateOrCreate([
            'room_id' => '3',
            'status' => '1',
            'time' => '2021-01-03'
        ]);

        $n1_111_3 = RoomStatus::updateOrCreate([
            'room_id' => '4',
            'status' => '1',
            'time' => '2021-01-03'
        ]);

        $n2_211_3 = RoomStatus::updateOrCreate([
            'room_id' => '5',
            'status' => '1',
            'time' => '2021-01-03'
        ]);

        $n4_311_3 = RoomStatus::updateOrCreate([
            'room_id' => '6',
            'status' => '1',
            'time' => '2021-01-03'
        ]);

        //ngay thu 4
        $v1_101_4 = RoomStatus::updateOrCreate([
            'room_id' => '1',
            'status' => '0',
            'time' => '2021-01-04'
        ]);

        $v2_201_4 = RoomStatus::updateOrCreate([
            'room_id' => '2',
            'status' => '0',
            'time' => '2021-01-04'
        ]);

        $v4_301_4 = RoomStatus::updateOrCreate([
            'room_id' => '3',
            'status' => '0',
            'time' => '2021-01-04'
        ]);

        $n1_111_4 = RoomStatus::updateOrCreate([
            'room_id' => '4',
            'status' => '0',
            'time' => '2021-01-04'
        ]);

        $n2_211_4 = RoomStatus::updateOrCreate([
            'room_id' => '5',
            'status' => '0',
            'time' => '2021-01-04'
        ]);

        $n4_311_4 = RoomStatus::updateOrCreate([
            'room_id' => '6',
            'status' => '0',
            'time' => '2021-01-04'
        ]);
    }
}
