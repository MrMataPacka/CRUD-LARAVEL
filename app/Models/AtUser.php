<?php

namespace App\Models;

use App\Models\GeneratedRelations\AtUserRelations;
use Illuminate\Database\Eloquent\Model;

class AtUser extends Model
{
    use AtUserRelations;

    public function town()
    {
        return $this->belongsTo(AtTown::class, 'towid', 'towid');
    }

    protected $primaryKey = 'uid';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'at_users';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['uid'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
