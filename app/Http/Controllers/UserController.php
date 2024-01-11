<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$users = User::all();
        $users = DB::table('users')->select(['id', 'name', 'image', 'email', 'role'])->get();
        return response()->json($users, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();
    }

    /**
     * Upload an image
     */
    public function uploadimage(Request $request, string $id)
    {
        /*
       

        // il faut compresser l'image avant de l'enregistrer sur le serveur
        $uncompressed_image = charge l'image;
        $compressed_image = \Tinify\compress($uncompressed_image);
*/
    }

    public function list_all()
    {
        $users = User::all();
        return view('user_picture.accueil', ['users' => $users]);
    }

    public function displayForm($id)
    {
        $currentUser = User::find($id);

        return view('user_picture.ajout_image')->with([
            'id' => $id,
            'currentUser' => $currentUser
        ]);
    }


    public function storeImage(Request $request)
    {

        try {
            \Tinify\setKey(env("TINYPNG"));
            $source = \Tinify\fromFile(
                $request->file('image')
            );
            $demo = $source->toBuffer();
            $path = uniqid() . '.png';
            Storage::put($path, $demo);

            $currentUser = User::find($request->userId);
            $currentUser->image = '/images/' . $path;
            $currentUser->save();
            return response()->json("ok");
        } catch (\Throwable $th) {
            dd($th);
        }

        return response()->json('ok');
    }

    public function compresser()
    {
        return "coucou";
    }
}
