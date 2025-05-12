<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QcReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_segment_id',
        'reviewer_id',
        'status', // 'approved' or 'rejected'
        'comments'
    ];

    public function segment()
    {
        return $this->belongsTo(OrderSegment::class, 'order_segment_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function warnings()
    {
        return $this->hasMany(Warning::class);
    }
}
