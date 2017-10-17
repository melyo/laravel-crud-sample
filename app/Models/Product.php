<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'price',
        'size',
        'quantity'
    ];

    /**
     * Round off price to nearest hundredths.
     *
     * @param  string  $value
     * @return void
     */
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = round($value, 2);
    }

    /**
     * Round off size to nearest hundredths.
     *
     * @param  string  $value
     * @return void
     */
    public function setSizeAttribute($value)
    {
        $this->attributes['size'] = round($value, 2);
    }

    /**
     * Returns array of validation rules.
     *
     * @param  int $id
     * @return array
     */
    public static function rules($id=null)
    {
        if (empty($id)) {
            $sometimes = '';
            $id = '';
        } else {
            $sometimes = 'sometimes|';
            $id = ','.$id;
        }

        return [
            'code'      => $sometimes.'integer|min:1000|max:9999|unique:products,code'.$id,
            'name'      => $sometimes.'required|max:255',
            'price'     => $sometimes.'numeric|min:0|max:999999999',
            'size'      => $sometimes.'numeric|min:0|max:999999999',
            'quantity'  => $sometimes.'integer|min:0|max:1000'
        ];
    }
}
