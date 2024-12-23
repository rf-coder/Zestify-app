<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address', 'total_price'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
