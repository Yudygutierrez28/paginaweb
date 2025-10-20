<?php

namespace App\Exports;

use App\Models\Adoptante;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdoptantesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Adoptante::select('id','nombre','apellido','email','telefono')->get();
    }

    public function headings(): array
    {
        return ['ID','Nombre','Apellido','Email','Teléfono'];
    }
}
