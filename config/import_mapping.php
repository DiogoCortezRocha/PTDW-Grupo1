<?php

// config/import_mapping.php

return [
    'user' => [
        'no_func' => 'numeroFuncionario',
        'nome' => 'nome',
        'acn_doc' => 'acn',
    ],
    
    'unidadecurricular' => [
        'cod_uc' => 'codigo',
        'acn_uc' => 'acn',
        'nome_uc' => 'name',
        'horas' => 'horas',
    ],

    'utilizador_uc' => [
        'no_func' => 'numeroFuncionario',
        'cod_uc' => 'codigoUC',
        'responsavel' => 'docenteresponsavel',
        'perc' => 'percentagem',
    ],

    'curso' => [
        'cod_curso' => 'codigo',
        'curso' => 'nome',
    ],

    'curso_uc' => [
        'cod_curso' => 'codigoCurso',
        'cod_uc' => 'codigoUC',
    ]
];