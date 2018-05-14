<?php

Route::get('/', function () {
    return view('bta.bta');
});

Route::post('/', function () {
    dd(request()->all());
});

//Žemiau - pavardė neprivaloma
Route::get('/pasisveikink/{vardas}/{pavarde?}', function (string $vardas, string $pavarde = null)
{
 return 'Labas, ' . $vardas . ' ' . $pavarde;
})->name('bta.pasisveikink');

Route::get('/skaiciuotuvas/{skaicius1}/{veiksmas}/{skaicius2}', function (float $skaicius1, string $veiksmas, float $skaicius2):float
{
     switch ($veiksmas) {
         case 'sudetis':
             return $skaicius1 + $skaicius2;
             break;
         case 'atimtis':
             return $skaicius1 - $skaicius2;
             break;
         case 'daugyba':
             return $skaicius1 * $skaicius2;
             break;
         case 'dalyba':
             return $skaicius1 / $skaicius2;
             break;
         default:
             echo 'Kažkas nepavyko. Galimi veiksmai: sudetis, atimtis, daugyba, dalyba';
             break;
     }
});

Route::redirect('/laravel', 'http://laravel.com', 301);
