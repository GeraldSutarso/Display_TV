<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = ['id',
        'nama_dosen',
        'foto_dosen',
    ];

    public function weeklySchedules()
    {
        return $this->hasMany(WeeklySchedule::class);
    }
}
