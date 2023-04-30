<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContartE;
use App\Models\ContartO;

class Client extends Model
{
    use HasFactory;
    protected $guaded = [];
    protected $fillable = [
        "name",
        "cin",
        "address",
        "ville",
        "phone"
    ];


    public function contrat_e(){
        return $this->hasMany(ContartE::class);
    }

    public function contrat_o(){
        return $this->hasMany(ContartO::class);
    }
}
