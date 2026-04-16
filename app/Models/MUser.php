<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MUser extends Authenticatable {
    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    protected $fillable = ['level_id','username','nama','password'];
    protected $hidden = ['password','remember_token'];

    public function level() {
        return $this->belongsTo(MLevel::class, 'level_id', 'level_id');
    }
    public function stoks() {
        return $this->hasMany(TStok::class, 'user_id', 'user_id');
    }
    public function penjualans() {
        return $this->hasMany(TPenjualan::class, 'user_id', 'user_id');
    }
    
    protected static ?string $model = MUser::class;
    protected static ?string $recordTitleAttribute = 'nama';
}