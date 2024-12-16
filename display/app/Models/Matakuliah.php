<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_matkul',
    ];

    public function weeklySchedules()
    {
        return $this->hasMany(WeeklySchedule::class);
    }
}
