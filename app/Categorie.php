<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @property int $categ_id
 * @property string $categ_name
 * @property string $categ_image
 * @property string $updated_at
 * @property string $created_at
 * @property Subcategory[] $subcategories
 */
class Categorie extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'categ_id';

    /**
     * @var array
     */
    protected $fillable = ['categ_name', 'categ_image', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategories()
    {
        return $this->hasMany('App\Subcategorie', 'categ_id', 'categ_id');
    }
}
