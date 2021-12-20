<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'status',
        'time',
    ];

    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }

    public function saveStatus(Request $data)
    {
        $status = $this->create([
            'room_id' => $data['room_id'],
            'status' => $data['status'],
            'time' => $data['time'],
        ]);

        return $status;
    }

    public function search(array $data)
    {
        $roomStatusTime = array_key_exists('key', $data) ? $data['key'] : null;
        $filterStatus = array_key_exists('filter_status', $data) ? $data['filter_status'] : null;
        $room = array_key_exists('room_id', $data) ? $data['room_id'] : null;

        return $this
                    ->SearchRoomStatusTime($roomStatusTime)
                    ->FilterByStatus($filterStatus)
                    ->WhereHasRoom($room)
                    ->latest('id')
                    ->paginate(array_key_exists('number', $data) ? $data['number'] : 5);
    }

    public function scopeSearchRoomStatusTime($query, $roomStatusTime)
    {
        return $query->where('time', 'like', '%' . $roomStatusTime . '%');
    }

    public function scopeFilterByStatus($query, $filterStatus)
    {
        return $query->where('status', 'like', '%' . $filterStatus . '%');
    }

    public function scopeWhereHasRoom($query, $room)
    {
        return $query->where('room_id', 'like', '%' . $room . '%');
    }

}
