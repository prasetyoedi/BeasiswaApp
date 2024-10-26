<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model untuk mengelola data beasiswa.
 * 
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property int $semester
 * @property string $file
 * @property string $status_ajuan
 */
class Beasiswa extends Model
{
    use HasFactory;

    /**
     * Kolom-kolom yang bisa diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'semester',
        'file',
        'status_ajuan',
    ];
}
