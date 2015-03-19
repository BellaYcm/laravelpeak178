<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model {

    public function hasManyComments()
    {
        return $this->hasMany('App\Comment', 'release_id', 'id')->where('type','=',1);
    }

}
