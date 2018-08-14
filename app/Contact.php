<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property  manufacturer_id
 * @property int $manufacturer_id
 */
class Contact extends Model
{

    protected $fillable = ['name', 'surname', 'email','slug', 'manufacturer_id'];


    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class);
    }

    //-------------------------
    public function getManufacturersTitle() {
        return($this->manufacturer != null) ? $this->manufacturer->title : '-';
    }

    //-------------------------
    public static function add($fields) {
        $contact = new static;
        $contact->fill($fields);
        $contact->save();
        return $contact;
    }

    public function edit($fields) {
        $this->fill($fields);
        $this->save();
    }

    public function setManufacturer($id)
    {
        if($id == null) {return;}
        $this->manufacturer_id = $id;
        $this->save();
    }


}
