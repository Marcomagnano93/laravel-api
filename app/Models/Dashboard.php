<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'git',
        'type_id',
        'description'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function tecnologies()
    {
        return $this->belongsToMany(Tecnology::class);
    }
}
