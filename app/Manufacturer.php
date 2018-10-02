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

    protected $fillable = ['title', 'site_link', 'email', 'number', 'address', 'code_product', 'comment', 'slug'];

    //------------------------
    public function contact(){
        return $this->hasMany(Contact::class, 'manufacturer_id');
    }

    //------------------------
    public function product()
    {
        return $this->hasMany(Product::class, 'manufacturer_id');
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
