<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PollResource extends JsonResource
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
          'descendants' => $this->kids_count,
          'parts' => $this->parts->pluck('id'),
          'score' => intval($this->total_votes),
          'text' => $this->text,
          'time' => $this->time,
          'title' => $this->title,
        ];
    }
}
