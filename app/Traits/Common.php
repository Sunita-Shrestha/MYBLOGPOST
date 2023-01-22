<?php
namespace App\Traits;

trait Common{
    public function fun1(){
        return "Trait response";
    }

    public function status($status = 0){

        $statusText = "InActive";
        if($status == 1){
            $statusText = "Active";
        }
        return $statusText;
    }
    public function verifyAndUpload(Request $request, $fieldname = 'image', $directory = 'images' ) {

        if( $request->hasFile( $fieldname ) ) {

            if (!$request->file($fieldname)->isValid()) {

                flash('Invalid Image!')->error()->important();

                return redirect()->back()->withInput();

            }

            return $request->file($fieldname)->store($directory, 'public');

        }

        return null;

    }

}


