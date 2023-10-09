<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mapel():BelongsTo
    {
        return $this->belongsTo(Mapel::class);
    }

    public function tahunAjaran():BelongsTo
    {
        return $this->belongsTo(TahunAjaran::class);
    }
}
