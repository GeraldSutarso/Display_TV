<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklySchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'week_number',
        'group_id',
        'matkul_id',
        'dosen_id',
        'kelas_id',
        'start_time',
        'end_time',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matkul_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
