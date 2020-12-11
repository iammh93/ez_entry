<?php

namespace App\Domain\Users\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model {
    use SoftDeletes, HasFactory;

    protected $guarded = [
        "id", "created_at", "updated_at", "deleted_at"
    ];

    protected $fillable = [
        "full_name", "phone_number", "temperature", "checkin_date"
    ];

    protected $hidden = [
        "created_at", "updated_at", "deleted_at"
    ];

    protected $appends = [];

    protected $casts = [
        'checkin_date' => 'datetime',
    ];
}
