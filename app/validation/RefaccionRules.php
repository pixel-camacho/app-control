<?php

namespace App\Validation;
use App\Models\RefaccionModel;

class RefaccionRules {

    public function pieza_multifuncional_exit(int $multifuncional_id, string $pieza):bool
    {
        $model  = new RefaccionModel();
        $refaccion = $model->where('multifuncional_id',$multifuncional_id)
                           ->where('pieza', $pieza)
                           ->first();

        return $refaccion == null ? true : false;
    }
}