<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use App\Models\Media;
use App\Models\Usuario;


class FavoritosController extends Controller{

    public function toggle($id, $user_id){
  
        $user = Usuario::find($user_id);
        $media = Media::find($id);

         if(!$user->mediasFavoritos->contains($media)) {
             $user->mediasFavoritos()->attach($media);
         }else{
            $user->mediasFavoritos()->detach($media);
         }
         return redirect()->back()->with('media', $media);
    }

}