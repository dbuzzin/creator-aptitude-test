<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UpdateJson extends Controller {
    public function postChangeUrl(Request $request) {
        $newUrl = $request->input('book_now_url');
        $jsonString = file_get_contents(base_path('resources/json/api.json'));
        $data = json_decode($jsonString, true);
    
        foreach ($data['properties'] as &$properties) {
            if ($properties['contracts']) {
                foreach ($properties['contracts'] as &$contracts) {
                    $contracts['book_now_url'] = $newUrl;
                }
            }
        }
  
        $newJsonString = json_encode($data, JSON_PRETTY_PRINT);
        
        file_put_contents(base_path('resources/json/api.json'), $newJsonString);
    }
    public function testChangeUrl(Request $request) {
        $propertyIndex = $request->get('property');
        $contractIndex = $request->get('contract');
        $newUrl = $request->input('book_now_url');
        $jsonString = file_get_contents(base_path('resources/json/api.json'));
        $data = json_decode($jsonString, true);

        // if ($data['properties'][$propertyIndex]['contracts']) {
        //     foreach ($data['properties'][$propertyIndex]['contracts'] as &$contracts) {
        //         $contracts['book_now_url'] = $newUrl;
        //     }
        // }

        $data['properties'][$propertyIndex]['contracts'][$contractIndex]['book_now_url'] = $newUrl;

        $newJsonString = json_encode($data, JSON_PRETTY_PRINT);
        
        file_put_contents(base_path('resources/json/api.json'), $newJsonString);
    }
}

?>