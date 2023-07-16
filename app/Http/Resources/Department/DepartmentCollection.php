<?php

namespace App\Http\Resources\Department;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "role"=>$this->dept_name,

                'employeeslists'=>$this->employees


            // "employees"=>[
            //     'employeeslist'=>$this->employees
            // ]

        ];
    }
}
