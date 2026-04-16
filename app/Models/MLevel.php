<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MLevel extends Model {
    protected $table = 'm_level';
    protected $primaryKey = 'level_id';
    protected $fillable = ['level_kode','level_nama'];

    public function users() {
        return $this->hasMany(MUser::class, 'level_id', 'level_id');
    }
    
    protected static ?string $model = MLevel::class;
    protected static ?string $recordTitleAttribute = 'level_nama';
}