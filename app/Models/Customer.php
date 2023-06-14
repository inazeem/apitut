<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Model\Invoice;

class Customer extends Model
{
    use HasFactory;
    protected $fillable =[
      'name', 'type','email','address','city','state','postalcode'
    ];

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
