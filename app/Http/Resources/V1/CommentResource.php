<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      return [
        'id' => $this->id,
        'by' => $this->by,
        'kids' => $this->kids->pluck('id'),
        'parent' => $this->parent_id,
        'text' => $this->text,
        'time' => $this->time,
      ];
    }
}
