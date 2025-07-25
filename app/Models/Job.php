<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'location',
        'category',
        'description',
        'start_date',
        'end_date',
        'cover_image',
        'status',
        'salary'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'salary' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCategoryLabelAttribute()
    {
        $labels = [
            'fulltime' => 'Full Time',
            'parttime' => 'Part Time',
            'contract' => 'Contract',
            'internship' => 'Internship',
            'freelance' => 'Freelance'
        ];

        return $labels[$this->category] ?? $this->category;
    }

    public function getStatusLabelAttribute()
    {
        $labels = [
            'active' => 'Aktif',
            'inactive' => 'Tidak Aktif',
        ];

        return $labels[$this->status] ?? $this->status;
    }
}