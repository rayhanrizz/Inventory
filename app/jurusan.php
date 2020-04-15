<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
	protected $primaryKey = 'id_jurusan';
    protected $table = 'jurusan';

    protected $fillable = ['nama_jurusan', 'jurusan_fakultas'];

    public function fakultas(){
    	return $this->belongsTo('App\Fakultas','jurusan_fakultas','id');
    }
}
