<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Sheet;


class FinalExport implements WithMultipleSheets, WithStyles, ShouldAutoSize
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function sheets(): array
    {
        $sheets = [];

        // Sheet 1: Country


        $sheets[] = new GenderSheet($this->data->gender_data);
       // $sheets[] = new RegionSheet($this->data->region_data);
        $sheets[] = new CountrySheet($this->data->country_data);
        $sheets[] = new AllPanelsSheet($this->data->panels_data);
        $sheets[] = new ExpertiseSheet($this->data->expertise_Data);
        $sheets[] = new AffiliationSheet($this->data->affiliation_Data);

        return $sheets;
    }

    public function styles($data): array
    {
        $styles = [];
        //Apply styles for each sheet

        // foreach ($this->sheets() as $sheet) {
        //     if ($sheet instanceof WithStyles) {
        //         $sheetStyles = $sheet->styles($data);
        //         $styles = array_merge($styles, $sheetStyles);
        //     }
        // }

        return $styles;
    }
}
