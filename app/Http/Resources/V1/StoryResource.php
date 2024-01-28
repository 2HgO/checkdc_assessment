<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoryResource extends JsonResource
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
          'descendants' => $this->kids_count,
          'kids' => $this->kids->pluck('id'),
          'score' => $this->score,
          'time' => $this->time,
          'title' => $this->title,
          'url' => $this->url,
          'category' => $this->category,
          'text' => $this->text,
        ];
    }
}
