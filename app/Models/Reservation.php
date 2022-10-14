<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * @property integer $id
 * @property string $time
 */
class Reservation extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    // Timestamps
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['id', 'time', 'user_id', 'factor'];

    /**
     * @return BelongsTo
     * @description get the user for the reservation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
