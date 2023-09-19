<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function mapel(): BelongsTo
    {
        return $this->belongsTo(Mapel::class);
    }
}
