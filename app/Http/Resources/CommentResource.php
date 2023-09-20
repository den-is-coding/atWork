<?php

namespace App\Http\Resources;

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
        'content' => $this->content,
        'score' => $this->score,
        'member_id' => $this->member_id,
        'company_id' => $this->company_id,
    ];
    }
}
