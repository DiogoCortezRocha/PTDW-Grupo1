<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class UsersExport implements FromQuery, WithHeadings, WithMapping,ShouldAutoSize,WithTitle,WithStyles
{
    public function query()
    {
        return User::whereIn('tipoUtilizador', ['docente', 'ambos']);
    }

    public function headings(): array
    {
        return [
            'Número Funcionário',
            'Nome',
            'Email',
            'Telefone',
            'ACN',
            'Restrição Submetida',
            'Restrições Horárias',
            'Unidades Curriculares',
        ];
    }

    public function map($user): array
{

    $restricoes = $user->blocos->map(function ($bloco) {
        return $bloco->partDoDia . ' ' . $bloco->diaDaSemana;
    })->implode(', ');

    $unidadesCurriculares = $user->unidadesCurriculares->map(function ($uc) {
        return $uc->name;
    })->implode(', ');

    return [
        $user->numeroFuncionario,
        $user->nome,
        $user->email,
        $user->telefone,
        $user->acn,
        $user->restricaoSubmetida == 0 ? 'Não' : 'Sim',
        $restricoes, // Lista de restrições
        $unidadesCurriculares, // Lista de unidades curriculares

    ];
}

public function title(): string
    {
        return 'Listagem de Docentes, suas restrições e unidades curriculares';
    }

    public function styles(Worksheet $sheet)
{
    // Cabeçalhos em negrito com fundo azul claro
    $sheet->getStyle('A1:H1')->getFont()->setBold(true);
    $sheet->getStyle('A1:H1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFADD8E6');

    // Adiciona filtros de tabela
    $sheet->setAutoFilter($sheet->calculateWorksheetDimension());

    // Adiciona bordas à tabela
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'],
            ],
        ],
    ];
    $sheet->getStyle('A1:H' . $sheet->getHighestRow())->applyFromArray($styleArray);
}
}
