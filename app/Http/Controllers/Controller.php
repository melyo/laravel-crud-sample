<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function collectInput($request, $fields) {
        $data = [];

        foreach($fields as $field) {
            if (!is_null($request->get($field, null))) {
                $data[$field] = $request->get($field);
            }
        }

        return $data;
    }

    public function sortQuery($query)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);
            return $query->orderBy($sortCol, $sortDir);
        }

        return $query->orderBy('id', 'DESC');
    }
}
