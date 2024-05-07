<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorsData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'age',
        'gender',
        'address',
        'status',
        'is_visitor'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getGenderAttribute($value)
    {
        return $value === 'male' ? 'ذكر' : 'أنثى';
    }

    public function getStatusAttribute($value)
    {
        switch ($value) {
            case 'active':
                return 'مقبول';
            case 'inactive':
                return 'مرفوض';
            default:
                return $value;
        }
    }
}
