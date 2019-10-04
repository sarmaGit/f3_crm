<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vendor;

/**
 * App\Task
 *
 * @property int $id
 * @property string $name
 * @property string $phone_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    protected $fillable = ['name', 'phone_number', 'vendor_code', 'model'];

    public function vendor(){
        return $this->belongsTo(Vendor::class,'vendor_code','id');
    }
}
