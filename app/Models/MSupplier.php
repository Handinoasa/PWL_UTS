<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MSupplier extends Model {
    protected $table = 'm_supplier';
    protected $primaryKey = 'supplier_id';
    protected $fillable = ['supplier_kode','supplier_nama','supplier_alamat'];

    public function stoks() {
        return $this->hasMany(TStok::class, 'supplier_id', 'supplier_id');
    }

    protected static ?string $model = MSupplier::class;
    protected static ?string $recordTitleAttribute = 'supplier_nama'; 
}