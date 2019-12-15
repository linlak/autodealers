<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Traits\MyVariables;

class FieldsController extends Controller
{
    use MyVariables;
    //
    public function washingBays()
    {
        return $this->_showResults();
    }
    public function spareParts()
    {
        return $this->_showResults();
    }
}
