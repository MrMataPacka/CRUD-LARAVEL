<?php

namespace App\Models;

use App\Models\GeneratedRelations\AtTownRelations;
use Illuminate\Database\Eloquent\Model;

class AtTown extends Model
{
    use AtTownRelations;


    public function atState()
    {
        return $this->belongsTo(AtState::class, 'staid', 'staid');
    }

    protected $primaryKey = 'towid';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'at_town';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['towid'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
