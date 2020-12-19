<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $post_id
 * @property int $post_type_id
 * @property int $categ_id
 * @property int $sub_id
 * @property string $post_title
 * @property string $post_description
 * @property string $post_name
 * @property string $post_phone
 * @property string $post_email
 * @property string $updated_at
 * @property string $created_at
 * @property Category $category
 * @property PostType $postType
 * @property Subcategory $subcategory
 */
class Post extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'post_id';

    /**
     * @var array
     */
    protected $fillable = ['post_type_id', 'categ_id', 'sub_id', 'post_title', 'post_description', 'post_name', 'post_phone', 'post_email', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'categ_id', 'categ_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postType()
    {
        return $this->belongsTo('App\PostType', null, 'post_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory', 'sub_id', 'sub_id');
    }
}
