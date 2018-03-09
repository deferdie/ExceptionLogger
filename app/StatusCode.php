<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusCode extends Model
{
    protected $fillable = ['project_id', 'code', 'timeToNotify', 'errors'];

    public function project()
    {
        $this->belongsTo(Project::class);
    }
}
