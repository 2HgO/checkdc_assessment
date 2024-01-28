<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PollOptionResource extends JsonResource
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
          'poll' => $this->poll,
          'score' => $this->score,
          'text' => $this->text,
          'time' => $this->time,
        ];
    }
}
