<?php

namespace App\Imports;

use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Contracts\Importable;

class DsdImport implements ToModel, WithUpserts, WithHeadingRow
{
    protected $model;

    public function uniqueBy()
    {
        return 'numeroFuncionario';
    }

    public function __construct(Importable $model)
    {
        $this->model = $model;
    }

    

    public function model(array $row)
    {
        $modelName = strtolower(class_basename($this->model));
        
        // Get the mapping configuration for the specific model
        $mappingConfig = config("import_mapping.$modelName", []);
        
        // Apply the mapping logic based on the configuration
        $mappedData = [];
        foreach ($mappingConfig as $excelColumn => $modelField) {
                $mappedData[$modelField] = $row[$excelColumn] ?? null;
        }
        
        // Use the mapped data to create the model
        return $this->model->import($mappedData);
    }
}

