<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'json', 'property',
    ];


    /**
     * Get json.
     *
     * @return string
     */
    public function getJsonAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Set json.
     *
     * @param  string  $value
     * @return void
     */
    public function setJsonAttribute($value)
    {
        $this->attributes['json'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Get property.
     *
     * @return string
     */
    public function getPropertyAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Set property.
     *
     * @param  string  $value
     * @return void
     */
    public function setPropertyAttribute($value)
    {
        $this->attributes['property'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    
}
