<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function mapel(): HasMany
    {
        return $this->hasMany(Mapel::class);
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
