<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warning extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'qc_review_id', 'reason'];

    /**
     * Get the employee (user) who received the warning.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the QC review that triggered the warning.
     */
    public function qcReview()
    {
        return $this->belongsTo(QcReview::class);
    }
}
