<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'units',
        'price',
        
        'unit_type_id',
        'category_id',
        'supplier_id',
        'image','description'

    ];

    /**
     * Get the unit_type that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit_type(){
        return $this->belongsTo(UnitType::class, 'unit_type_id');
    }
    
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
        
    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
