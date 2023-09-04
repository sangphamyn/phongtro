<?php
namespace App\Http\Services;

class UploadService
{
    public function store($request) {
        if($request->hasFile('file')) {
            try {
                if(gettype($request->file('file')) == 'object') {
                    $name = $request->file('file')->getClientOriginalName();
                    $pathFull = 'uploads/' . date("Y/m/d");
                    $path = $request->file('file')->storeAs(
                        'public/' . $pathFull, $name
                    );
                    return '/storage/' . $pathFull . '/' . $name;
                }
                else if(sizeof($request->file('file')) > 1) {
                    $rs = '';
                    for($i = 0; $i < sizeof($request->file('file')); $i++) {
                        $name = $request->file('file')[$i]->getClientOriginalName();
                        $pathFull = 'uploads/' . date("Y/m/d");
                        $path = $request->file('file')[$i]->storeAs(
                            'public/' . $pathFull, $name
                        );
                        $rs .= '/storage/' . $pathFull . '/' . $name . '@sang@';
                    }
                    return $rs;
                }

                
            } catch (\Exception $error) {
                return false;
            }
        }
    }
}