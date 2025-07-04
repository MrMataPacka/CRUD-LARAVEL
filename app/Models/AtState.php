<?php

namespace App\Models;

use App\Models\GeneratedRelations\AtStateRelations;
use Illuminate\Database\Eloquent\Model;

class AtState extends Model
{
    use AtStateRelations;

    protected $primaryKey = 'staid';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'at_state';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['staid'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
