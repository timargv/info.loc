<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $contact
 */
class Manufacturer extends Model
{

    use Sluggable;

    protected $fillable = ['title', 'slug'];

    public function contact(){
        return $this->hasMany(Contact::class, 'manufacturer_id');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
