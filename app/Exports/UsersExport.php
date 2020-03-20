<?php

namespace App\Exports;

use App\User;
use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize
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
            '#',
            'Name',
            'Email',
            'Roles',
            '',
            '',
            'Created at',
            'Updated at'
        ];
    }
}
