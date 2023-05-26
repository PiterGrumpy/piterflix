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


class ReproduccionesController extends Controller{

    public function add($id, $user_id){
  
        $user = Usuario::find($user_id);
        $media = Media::find($id);

         if(!$user->mediasReproducidos->contains($media)) {
             $user->mediasReproducidos()->attach($media);
         }
    }

}