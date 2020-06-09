<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
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
        $this->attributes['json'] = json_encode($value);
    }
    
}
