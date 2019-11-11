<?php

namespace App;

use App\Events\TaskDeletedEvent;
use App\Events\TaskSavedEvent;
use Illuminate\Database\Eloquent\Model;

//use App\Vendor;

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
    protected $fillable = ['name', 'phone_number', 'vendor_code', 'model', 'expire_at', 'vendor_id'];

    // Set relation to vendor table
    public function vendor()
    {
//        return $this->belongsTo(Vendor::class, 'vendor_code', 'id');
//        return $this->belongsTo(Vendor::class, 'vendor_name', 'vendor_name');
        return $this->belongsTo(Vendor::class);
    }

    /*
     * Events
     */

    protected $dispatchesEvents = [
        'saved' => TaskSavedEvent::class,
        'deleting' => TaskDeletedEvent::class,
//        'created' =>
    ];

    /*
     * Queries
     */

    public static function tasks($dt, $order_by)
    {
        $tasks = Task::with(['vendor'])->whereDate('updated_at', '=', $dt)->orderBy($order_by)->get();
        return $tasks;
    }
}
