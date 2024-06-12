<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = 'Packages';

    protected $fillable = [
        'packageName',
        'packageGambar',
        'packageDeskripsi',
        'packagePrice'
    ];

}