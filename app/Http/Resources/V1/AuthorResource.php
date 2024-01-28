<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
        'created' => $this->created,
        'karma' => $this->karma,
        'about' => $this->about,
        'submitted' => array_merge(
          $this->stories->pluck('id')->toArray(),
          $this->polls->pluck('id')->toArray(),
          $this->pollOptions->pluck('id')->toArray(),
          $this->comments->pluck('id')->toArray(),
        ),
      ];
    }
}
