<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $sku
 * @property float $price
 * @property int $is_active
 * @property float|null $weight
 * @property array|null $dimensions
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\OrderProduct[] $orderProducts
 * @property int|null $order_products_count
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property int|null $orders_count
 * @package App\Models
 */
class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'sku',
        'price',
        'is_active',
        'weight',
        'dimensions',
        'image',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'dimensions' => 'array',
    ];

    /**
     * Get the products's orders.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')->withPivot('quantity')->withTimestamps();
    }

    /**
     * Get the product's order products.
     */
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
