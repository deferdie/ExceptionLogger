<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUniqueException extends Model
{
    protected $fillable = ['project_exception_id', 'count'];

    public function exceptions()
    {
        return $this->belongsTo(ProjectException::class);
    }
}
