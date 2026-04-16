<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MKategori extends Model {
    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';
    protected $fillable = ['kategori_kode','kategori_nama'];

    public function barangs() {
        return $this->hasMany(MBarang::class, 'kategori_id', 'kategori_id');
    }
    protected static ?string $model = MKategori::class;
    protected static ?string $recordTitleAttribute = 'kategori_nama';
}