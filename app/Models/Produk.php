<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the default naming convention
    protected $table = 'produks';

    // Define which fields are fillable
    protected $fillable = [
        'nama_product',
        'barcode',
        'kategori',
        'harga',
        'stok',
        'deskripsi',
        'gambar',
        'created_at',
        'updated_at',
    ];

    // If timestamps are handled automatically, you can omit the timestamps from fillable
    // Disable if 'created_at' and 'updated_at' are not automatically managed by Laravel
    public $timestamps = true;
}
