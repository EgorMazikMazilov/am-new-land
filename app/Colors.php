<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model {

	//
    protected $table = 'colors';
    protected $fillable = [
        'img',
        'color',
        'price'
    ];
 public function getColor($id){
     Colors::where('id',$id)->get();
 }
}
