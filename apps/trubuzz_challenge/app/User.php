<?php

namespace App;

use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Messagable;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'created_time'];

    public function attention_users()
    {
        return $this->belongsToMany('App\User', 'attentions', 'user_id', 'attention_user_id');
    }

    public function followed_users()
    {
        return $this->belongsToMany('App\User', 'attentions', 'attention_user_id', 'user_id');
    }

    /**
     * 一個User可以擁有多個Book
     */
    public function books()
    {
        return $this->hasMany('App\Book');
    }

    /**
     * Set the value of the "created_time" attribute.
     *
     * @param  mixed  $value
     * @return void
     */
    public function setCreatedAt($value)
    {
        $this->created_time = $value;
    }

    /**
     * Set the value of the "updated at" attribute.
     *
     * @param  mixed  $value
     * @return void
     */
    public function setUpdatedAt($value)
    {
        
    }
}
