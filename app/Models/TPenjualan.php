<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TPenjualan extends Model {
    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';
    protected $fillable = ['user_id','pembeli','penjualan_kode','penjualan_tanggal'];
    protected $casts = ['penjualan_tanggal' => 'datetime'];

    public function user() {
        return $this->belongsTo(MUser::class, 'user_id', 'user_id');
    }
    public function details() {
        return $this->hasMany(TPenjualanDetail::class, 'penjualan_id', 'penjualan_id');
    }
    public function getTotalAttribute() {
        return $this->details->sum(fn($d) => $d->harga * $d->jumlah);
    }

    protected static ?string $model = TPenjualan::class;
protected static ?string $recordTitleAttribute = 'penjualan_kode';
}