<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_segment_id',
        'user_id',
        'assigned_at',
        'submitted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderSegment()
    {
        return $this->belongsTo(OrderSegment::class);
    }
}
