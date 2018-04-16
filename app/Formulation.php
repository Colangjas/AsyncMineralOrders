<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulation extends Model
{
    protected $fillable = ['product', 'material'];

    public function newFormulation()
    {
        return $this->hasmany(Formulation::class);
    }
}
