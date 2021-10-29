<?php

namespace App\Validation;

use App\Models\RefaccioneModel;

class RefaccioneRules {

    public function pieza_multifuncional_exit(int $multifuncional_id, string $pieza):bool
    {
        $model  = new RefaccioneModel();
        $refaccion = $model->where('multifuncional_id',$multifuncional_id)
                           ->where('pieza', $pieza)
                           ->first();

        return $refaccion == null ? true : false;
    }
}