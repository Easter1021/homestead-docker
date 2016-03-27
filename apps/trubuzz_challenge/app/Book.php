<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    const UPDATED_AT = 'updated_time';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'books';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'created_time', 'updated_time'];

    /**
     * 取得擁有此電話的使用者。
     */
    public function user()
    {
        return $this->belongsTo('App\User');
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
        $this->updated_time = $value;
    }
}
