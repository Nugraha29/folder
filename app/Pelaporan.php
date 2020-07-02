<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    //
    protected $table = 'pelaporan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'telp', 'email', 'nama_perusahaan', 'bidang_usaha', 'jenis', 'periode', 'dok_pelaporan', 'dok_izin','dok_lab', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function review()
    {
        return $this->hasMany('App\Review');
    }
}
