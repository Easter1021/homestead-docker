<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
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
