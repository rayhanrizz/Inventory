<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    protected $primaryKey = 'id_ruangan';
    protected $table = 'ruangan';

    protected $fillable = [ 'jurusan_id','nama_ruangan'];

    public function jurusan(){
    	return $this->belongsTo('App\jurusan','jurusan_id','id_jurusan');
    }
}
