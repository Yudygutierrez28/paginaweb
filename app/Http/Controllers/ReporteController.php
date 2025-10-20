<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adoptante;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdoptantesExport;

class ReporteController extends Controller
{
    // Vista web con tabla y gráfico
    public function index()
    {
        $adoptantes = Adoptante::all();

        // Datos de prueba si no hay adoptantes registrados
        if($adoptantes->isEmpty()) {
            $adoptantes = collect([
                (object)['id'=>1,'nombre'=>'Ana','apellido'=>'Perez','email'=>'ana@mail.com','telefono'=>'3001234567','created_at'=>now()],
                (object)['id'=>2,'nombre'=>'Juan','apellido'=>'Lopez','email'=>'juan@mail.com','telefono'=>'3012345678','created_at'=>now()->subMonth()],
                (object)['id'=>3,'nombre'=>'Maria','apellido'=>'Gomez','email'=>'maria@mail.com','telefono'=>'3023456789','created_at'=>now()->subMonths(2)],
            ]);
        }

        // Datos para gráfico: adoptantes por mes
        $chartData = $adoptantes
            ->groupBy(function($item) {
                return $item->created_at->format('F');
            })
            ->map(fn($items) => [
                'month' => $items->first()->created_at->format('F'), 
                'total' => $items->count()
            ]);

        return view('reportes.index', compact('adoptantes', 'chartData'));
    }

    // Exportar PDF
    public function exportPDF()
    {
        $adoptantes = Adoptante::all();

        if($adoptantes->isEmpty()) {
            $adoptantes = collect([
                (object)['id'=>1,'nombre'=>'Ana','apellido'=>'Perez','email'=>'ana@mail.com','telefono'=>'3001234567','created_at'=>now()],
                (object)['id'=>2,'nombre'=>'Juan','apellido'=>'Lopez','email'=>'juan@mail.com','telefono'=>'3012345678','created_at'=>now()->subMonth()],
                (object)['id'=>3,'nombre'=>'Maria','apellido'=>'Gomez','email'=>'maria@mail.com','telefono'=>'3023456789','created_at'=>now()->subMonths(2)],
            ]);
        }

        $pdf = Pdf::loadView('reportes.pdf', compact('adoptantes'));
        return $pdf->download('adoptantes.pdf');
    }

    // Exportar Excel
    public function exportExcel()
    {
        return Excel::download(new AdoptantesExport, 'adoptantes.xlsx');
    }
}
