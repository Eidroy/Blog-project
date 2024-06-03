<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkshopsResource extends JsonResource
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
            'workshop_name' => $this->workshop_name,
            'hosted_by' => $this->hosted_by,
            'country' => $this->country,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'contact' => $this->contact,
            'user_email' => $this->user_email,
            'user_id' => $this->user_id,
            'date' => $this->date,
            'time' => $this->time,
            'attendees' => $this->attendees,
            'payment' => $this->payment,
        ];
    }
}
