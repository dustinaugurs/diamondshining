<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'              => $this->id,
            'first_name'      => $this->first_name,
            'last_name'       => $this->last_name,
            'email'           => $this->email,
            'company'         => $this->company,
            'designation'     => $this->designation,
            'phone_no'        => $this->phone_no,
            'address_line1'   => $this->address_line1,
            'address_line2'   => $this->address_line2,
            'address_line3'   => $this->address_line3,
            'country'         => $this->country,
            'state'           => $this->state,
            'city'            => $this->city,
            'zip'             => $this->zip,
            'enquiry'         => $this->enquiry,
            'find_us'         => $this->find_us,
            'website'         => $this->website,
            'markup_template' => $this->markup_template,
            'picture'         => $this->getPicture(),
            'confirmed'       => $this->confirmed,
            'role'            => optional($this->roles()->first())->name,
            'permissions'     => $this->permissions()->get(),
            'status'          => $this->status,
            'created_at'      => $this->created_at->toIso8601String(),
            'updated_at'      => $this->updated_at->toIso8601String(),
        ];
    }
}
