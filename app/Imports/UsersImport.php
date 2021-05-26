<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new User([
            'name'     => $row['name'],
            'email'    => $row['email'], 
            'age' => $row['age'],
            'details' => $row['details'],
            'phone' => $row['phone'],
            'designation' => $row['designation'],
            'address' => $row['address'],
            'country' => $row['country'],
            'salary' => $row['salary'],
            'status' => $row['status'],
        ]);
        
    }
    public function rules(): array
    {
        return [
             
        ];
    }
}
