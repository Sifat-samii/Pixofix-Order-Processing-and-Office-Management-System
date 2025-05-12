<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSegment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'segment_name',
        'file_path',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function task()
    {
        return $this->hasOne(Task::class);
    }

    public function qcReviews()
    {
        return $this->hasMany(QcReview::class);
    }
}
