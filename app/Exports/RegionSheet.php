<?php

namespace App\Exports;
  
use App\Models\Questionnaire;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\WithStyles; 
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
 

 

class RegionSheet implements FromCollection,WithTitle, WithHeadings,ShouldAutoSize,WithStyles,WithColumnWidths
{
    use Exportable;


      private $data;

    public function __construct($data=null)
    {       
        $this->data = $data;
    }


 
    public function collection()
    {

        return new Collection($this->data);

         
    }
    public function title(): string
    {
        return 'Region Wise';
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
            if (isset($item['region'])) {
                $cellCoordinate = 'A' . ($index + 1);
                $styles[$cellCoordinate] = [
                    'font' => [
                        'bold' => true,
                        //'color' => ['rgb' => 'FFFFFF'] //Set text color
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'F3DFA2'], //Set the background color here
                    ],
                ];
            }
            if($index==0){
                if (isset($item['totalScoretitle'])) {
                    $cellCoordinate = 'B' . ($index + 1);
                    $styles[$cellCoordinate] = [
                        'font' => [
                            'bold' => true,
                            //'color' => ['rgb' => 'FFFFFF'] 
                        ],
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => ['rgb' => 'F3DFA2'], //Set the background color here
                        ],
                    ];
                }
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
