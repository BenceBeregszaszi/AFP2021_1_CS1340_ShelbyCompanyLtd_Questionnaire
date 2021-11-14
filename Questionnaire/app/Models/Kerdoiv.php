<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerdoiv extends Model
{
    use HasFactory;

    protected $table = 'kerdoivs';

    protected $primaryKey = 'kerdoiv_id';
    
    protected $fillable = ['kerdoiv_nev'];

    public $timestamps = false;
}
