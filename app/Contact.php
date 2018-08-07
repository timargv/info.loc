<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 */
class Contact extends Model
{

    protected $fillable = ['name', 'slug', 'manufacturer_id'];

    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class);
    }

    //-------------------------
    public function getManufacturersTitle() {
        return($this->manufacturer != null) ? $this->manufacturer->title : 'Нет поставщика';
    }




}
