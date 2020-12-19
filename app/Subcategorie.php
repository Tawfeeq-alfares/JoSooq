<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $sub_id
 * @property int $categ_id
 * @property string $sub_name
 * @property string $updated_at
 * @property string $created_at
 * @property Category $category
 */
class Subcategorie extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'sub_id';

    /**
     * @var array
     */
    protected $fillable = ['categ_id', 'sub_name', 'updated_at', 'created_at','categ_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'categ_id', 'categ_id');
    }
}
