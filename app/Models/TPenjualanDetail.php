<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TPenjualanDetail extends Model {
    protected $table = 't_penjualan_detail';
    protected $primaryKey = 'detail_id';
    protected $fillable = ['penjualan_id','barang_id','harga','jumlah'];

    public function penjualan() {
        return $this->belongsTo(TPenjualan::class,'penjualan_id','penjualan_id');}
    public function barang()    { 
        return $this->belongsTo(MBarang::class,'barang_id','barang_id');}

    public function getSubtotalAttribute() {
        return $this->harga * $this->jumlah;
    }
}