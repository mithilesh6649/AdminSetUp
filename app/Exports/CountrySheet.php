<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Sheet; 
use PhpOffice\PhpSpreadsheet\Style\Fill;

class CountrySheet implements FromCollection, WithTitle, WithHeadings, WithStyles, ShouldAutoSize,WithColumnWidths
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function title(): string
    {
        return 'Country Wise';
    }


    public function collection()
    {
        return new Collection($this->data);
    }

    public function headings(): array
    {
         
        return [                       
            "",           
            "Total Score",           
            
        ];
    }

    public function styles($data)
    {
        $styles = [];
        foreach ($this->data as $index => $item) {
            if (isset($item['country_title'])) {
                $cellCoordinate = 'A' . ($index + 1);
                $styles[$cellCoordinate] = [
                    'font' => [
                        'bold' => true,
                        //'color' => ['rgb' => 'FFFFFF'] //Set text color
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'F3DFA2'], //Set the background color
                    ],

                ];
            }

            if (isset($item['score_title'])) {
                $cellCoordinate = 'B' . ($index + 1);
                $styles[$cellCoordinate] = [
                    'font' => [
                        'bold' => true,
                        //'color' => ['rgb' => 'FFFFFF'] //Set text color
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'F3DFA2'], //Set the background color
                    ],
                ];
            }
        }
        return $styles;
    }


    public function columnWidths(): array
    {
        return [
            'A' => 120, // Set width for column A (Country)
            'B' => 12, // Set width for column B (Score)
        ];
    }
   
}
