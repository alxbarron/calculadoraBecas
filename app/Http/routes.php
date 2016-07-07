<?php

use App\Beca;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Index
 */
Route::get('/', function () {
	$becas = Beca::orderBy('created_at', 'dsc')->get();

    return view('becas', [
        'becas' => $becas
    ]);
});

/**
 * Calcula beca
 */
Route::post('/beca', function (Request $request) {
    $validator = Validator::make($request->all(), [
    	'name' => 'required|min:4|max:255',
    	'promedio' => 'required|min:8|max:10|numeric',
    	'colegiatura' => 'required|max:20000|numeric',
    ]);

    if($validator->fails()){
    	return redirect('/')
    		->withInput()
    		->withErrors($validator);
    }

    $porcentaje = Beca::calculaBeca($request->promedio);

    $ahorro = ($request->colegiatura * $porcentaje) / 100;

    $pago = $request->colegiatura - $ahorro;
 
    $beca = new Beca;
    $beca->name = $request->name;
    $beca->promedio = $request->promedio;
    $beca->beca = (string)$porcentaje.'%';
    $beca->colegiatura = $request->colegiatura;
    $beca->pago = $pago;
    $beca->save();

    return redirect('/');
});

/**
 * Guarda beca
 */
Route::delete('/beca/{beca}', function (Beca $beca) {
    $beca->delete();

    return redirect('/');
});
