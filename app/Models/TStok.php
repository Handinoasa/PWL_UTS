<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TStok extends Model {
    protected $table = 't_stok';
    protected $primaryKey = 'stok_id';
    protected $fillable = ['supplier_id','barang_id','user_id','stok_tanggal','stok_jumlah'];
    protected $casts = ['stok_tanggal' => 'datetime'];

    public function supplier() { 
        return $this->belongsTo(MSupplier::class, 'supplier_id', 'supplier_id');}
    public function barang()   { 
        return $this->belongsTo(MBarang::class, 'barang_id', 'barang_id');}
    public function user()     { 
        return $this->belongsTo(MUser::class, 'user_id', 'user_id');}

    protected static ?string $model = TStok::class;
    protected static ?string $recordTitleAttribute = 'stok_id';
}