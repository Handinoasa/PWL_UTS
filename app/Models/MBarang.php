<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MBarang extends Model {
    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';
    protected $fillable = ['kategori_id','barang_kode','barang_nama','harga_beli','harga_jual'];

    public function kategori() {
        return $this->belongsTo(MKategori::class, 'kategori_id', 'kategori_id');
    }
    public function stoks() {
        return $this->hasMany(TStok::class, 'barang_id', 'barang_id');
    }
    public function penjualanDetails() {
        return $this->hasMany(TPenjualanDetail::class, 'barang_id', 'barang_id');
    }
    
    protected static ?string $model = MBarang::class;
    protected static ?string $recordTitleAttribute = 'barang_nama';
}