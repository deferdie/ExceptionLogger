<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectExceptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id, 
            'project_id' => $this->project_id,
            'exception_count' => $this->uniqueException->count, 
            'status_code' => $this->status_code, 
            'url' => $this->url, 
            'message' => $this->message, 
            'line_number' => $this->line_number, 
            'request_uri' => $this->request_uri, 
            'server_name' => $this->server_name,
            'project_unique_exception_id' => $this->project_unique_exception_id
        ];
    }
}
