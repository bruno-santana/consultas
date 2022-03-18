<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Beneficiario extends Model
{  
  use HasFactory;
  protected $connection='sqlite-beneficiarios';
  protected $table='beneficiarios';

  public function findByCim($cim)
  {
    return DB::table('beneficiarios')
           ->select('select * from beneficiarios where id = ?', [$cim]);
  }
}
