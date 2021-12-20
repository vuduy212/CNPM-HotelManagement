<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RoomBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'date_start',
        'date_finish',
        'client_name',
        'CMND',
        'phone',
        'email',
        'payment',
        'bill_status',
        'created_at',
        'updated_at'
    ];

    public function categories()
    {
        return $this->belongsTo(RoomCategories::class, 'category_id');
    }

    public function saveBill(Request $data)
    {
        $bill = $this->create([
            'category_id' => $data['category_id'],
            'client_name' => $data['client_name'],
            'date_start' => Carbon::parse($data['date_start'])->format('Y-m-d'),
            'date_finish' => Carbon::parse($data['date_finish'])->format('Y-m-d'),
            // 'date_start' => $data['date_start'],
            // 'date_finish' => $data['date_finish'],
            'CMND' => $data['CMND'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'payment' => $data['payment'],
            'bill_status' => 0,
        ]);

        return $bill;
    }

    public function search(array $data)
    {
        $filterStatus = array_key_exists('filter_status', $data) ? $data['filter_status'] : null;
        $phone = array_key_exists('key', $data) ? $data['key'] : null;
        $date_start = array_key_exists('filter_date_start', $data) ? $data['filter_date_start'] : null;
        $date_finish = array_key_exists('filter_date_finish', $data) ? $data['filter_date_finish'] : null;

        return $this
                    ->SearchStatus($filterStatus)
                    ->SearchPhone($phone)
                    ->SearchDateStart($date_start)
                    ->SearchDateFinish($date_finish)
                    ->latest('id')
                    ->paginate(array_key_exists('number', $data) ? $data['number'] : 5);
    }

    public function scopeSearchStatus($query, $filterStatus)
    {
        return $query->where('bill_status', 'like', '%' . $filterStatus . '%');
    }

    public function scopeSearchPhone($query, $phone)
    {
        return $query->where('phone', 'like', '%' . $phone . '%');
    }

    public function scopeSearchDateStart($query, $date_start)
    {
        return $query->where('date_start', 'like', '%' . $date_start . '%');
    }

    public function scopeSearchDateFinish($query, $date_finish)
    {
        return $query->where('date_finish', 'like', '%' . $date_finish . '%');
    }
}
