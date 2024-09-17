<?php

namespace App\Models\json_database;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'product_name',
        'process',
        'working',
    ];
    // ------------ simplier way to handle data type --------------
    protected $casts=[
        'process'=>'array',
        'working'=>'array'
    ];
    // ----------- using accessors and mutators ------------
    // public function setProcessAttribute($value){
    //     $this->attributes['process']=json_encode($value);
    // }
    // public function setWorkingAttribute($value){
    //     $this->attributes['working']=json_encode($value);
    // }
    // public function getProcessAttribute($value){
    //     return json_decode($value);
    // }
    // public function getWorkingAttribute($value){
    //     return json_decode($value);
    // }
}
