<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationRequest extends Model
{
    use HasFactory;
    protected $primaryKey = 'no'; // 모델에서 기본 키를 'no'로 설정
    protected $fillable = ['email', 'request_date', 'request_time', 'status', 'confirmed_date'];

}
