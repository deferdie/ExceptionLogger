<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectExceptionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($exception){
                return [
                    'id' => $exception->id, 
                    'project_id' => $exception->project_id,
                    'exception_count' => $exception->uniqueException->count, 
                    'status_code' => $exception->status_code, 
                    'url' => $exception->url, 
                    'message' => $exception->message, 
                    'line_number' => $exception->line_number, 
                    'request_uri' => $exception->request_uri, 
                    'server_name' => $exception->server_name,
                    'project_unique_exception_id' => $exception->project_unique_exception_id
                ];
            }),
        ];
    }
}
