<?php
namespace App\Helpers;

use App\Http\Requests\CategoryStoreRequest;
use Illuminate\Support\Facades\Request;

 function UploadImage($path){
    $request=new CategoryStoreRequest();
    $image=$request->file('image');
    $imageName=$image->getClientOriginalName();
  return $imageUrl= $image->storeAs($path,$imageName);
}

