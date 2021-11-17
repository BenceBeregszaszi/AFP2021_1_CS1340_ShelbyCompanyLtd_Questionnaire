<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valaszok extends Model
{
    use HasFactory;

    protected $table = 'valaszoks';

    protected $primaryKey = ['valasz_id'];
    
    protected $fillable = ['kerdes_id','valasz','fiatalok','kozepkoruak','idosek','ferfi','no','egyeb'];

    public $timestamps = false;
}
