<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
    public function headings(): array
    {
        return [
            'name',
            'email',
            'age',
            'details',
            'phone',
            'designation',
            'address',
            'country',
            'salary',
            'status',
        ];
    }
    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            $user->age,
            $user->details,
            $user->phone,
            $user->designation,
            $user->address,
            $user->country,
            $user->salary,
            $user->status,

        ];
    }

}
