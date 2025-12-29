<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contacto';
    protected $primaryKey = 'contacto_id';
    public $timestamps = true;

    protected $fillable = ['nombre', 'telefono', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}