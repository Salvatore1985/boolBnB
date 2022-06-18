<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class ImagesController extends Controller
{
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $apartmentId = $image->apartment_id;
        $image->delete();

        return redirect()->route('user.apartments.edit', $apartmentId )->with('deleted-message', 'La tua foto è stata eliminata con successo');
    }
}
