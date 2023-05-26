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


class DescargasController extends Controller{

    public function toggle($id, $user_id){
  
        $user = Usuario::find($user_id);
        $media = Media::find($id);
        $msg = "Se ha añadido la " . $media->tipo . " a tus descargas. Ahora podrás visualizarla incluso cuando no tengas internet!";
         if(!$user->mediasDescargados->contains($media)) {
             $user->mediasDescargados()->attach($media);
         }else{
            $user->mediasDescargados()->detach($media);
            $msg = "Se ha eliminado esta ". $media->tipo . " de tus descargas!";
         }
         return redirect()->back()->with('message', $msg)->with('media', $media);

    }

}