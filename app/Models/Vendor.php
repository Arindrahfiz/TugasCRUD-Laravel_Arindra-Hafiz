<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';
    public $timestamps = false;

    protected $fillable = [
        'nama_perusahaan', 'kategori', 'email', 'telepon', 'alamat',
        'kota', 'npwp', 'nib', 'nama_pic', 'telepon_pic', 'status',
    ];
}