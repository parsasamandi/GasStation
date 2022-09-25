<?php

namespace App\Providers;

use Symfony\Component\HttpFoundation\Response;
use App\Models\Explanation;
use File;

class Action {

    /**
     * All reusable actions (GET,POST).
     * @return Json
     */

    // Edit
    public function edit($model, $id) {

        $values = $model::find($id);

        return $values ? response()->json($values) 
            : $this->failedResponse();

        return $this->successfulResponse();
    }
    
    // Delete
    public function delete($model, $id) {
        // Why did not try catch work?
        $values = $model::find($id);

        return $values ? $values->delete() 
                : $this->failedResponse();

        return $this->successfulResponse();
    }

    // Response with error
    public function failedResponse() {
        return response()->json(['error' => 'No data was found'], Response::HTTP_NOT_FOUND);
    }

    // Response with success
    public function successfulResponse() {
        return response()->json(['success' => 'It was successfully deleted'], Response::HTTP_OK);
    }
}