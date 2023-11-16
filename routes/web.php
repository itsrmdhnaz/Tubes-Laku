<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListOrderController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ManagemenController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DaftarPesananController;
use App\Http\Controllers\KurirController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        "title" => "welcome"
    ]);
});

Auth::routes();

//all role
Route::get('detailprofile', [HomeController::class, 'detailProfile'])->name('detail.profile');
Route::get('editprofile', [HomeController::class, 'EditProfile'])->name('edit.profile');
Route::put('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('update.profile');


// Normal user
Route::middleware(['auth', 'user-access:user, admin'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/user/order', [OrderController::class, 'index'])->name('orders.index');
    Route::post('user/orders/first', [OrderController::class, 'orderStepOne'])->name('order.storeFirst');
    Route::get('user/orders/{order_id}/step-two', [OrderController::class, 'orderStepTwoView'])->name('order.StepTwo');
    Route::post('user/orders/second', [OrderController::class, 'orderStepTwo'])->name('order.storeTwo');
    Route::get('user/daftarpesanan', [ListOrderController::class, 'index'])->name('list.order');
    Route::get('user/detailpesanan/{order_id}', [ListOrderController::class, 'detailPesanan'])->name('detail.pesanan');
    Route::get('/notification', [NotificationController::class, 'index'])->name('notification');
});

// Kurir user
Route::middleware(['auth', 'user-access:kurir, admin'])->group(function () {
    Route::get('kurir/home', [HomeController::class, 'kurirhome'])->name('kurir.home');
    //fitur update status
    Route::get('kurir/list-order', [KurirController::class, 'index'])->name('list.order.kurir');
    Route::get('/daftar-pesanan/{id}', [DaftarPesananController::class, 'getPesanan'])->name('admin.daftar.status');
    Route::put('/update-pesanan/{id}', [DaftarPesananController::class, 'updateStatus'])->name('update.daftar.status');
});

// Admin user
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('admin/home', [HomeController::class, 'adminhome'])->name('admin.home');

    // managemen user, kurir, barang
    Route::get('admin/managemen', [ManagemenController::class, 'managemen'])->name('admin.managemen');
    Route::Post('admin/managemen/users', [ManagemenController::class, 'storeUser'])->name('storeUser');
    Route::Post('admin/managemen/kurir', [ManagemenController::class, 'storeKurir'])->name('storeKurir');
    Route::get('/edit-user/{id}', [ManagemenController::class, 'editUser'])->name('edit.user');
    Route::put('/update-user/{id}', [ManagemenController::class, 'updateUser'])->name('update.user');
    Route::delete('/delete-user/{id}', [ManagemenController::class, 'deleteUser'])->name('delete.user');
    Route::Post('admin/managemen/barang', [ManagemenController::class, 'storeBarang'])->name('storeBarang');
    Route::Put('/update-barang/{id}', [ManagemenController::class, 'updateBarang'])->name('update.barang');
    Route::delete('/delete-barang/{id}', [ManagemenController::class, 'deleteBarang'])->name('delete.barang');

    //daftar pesanan
    Route::get('admin/daftar-pesanan', [DaftarPesananController::class, 'index'])->name('admin.daftar.pesanan');
    Route::put('/assign-kurir/{id}', [DaftarPesananController::class, 'assignKurir'])->name('update.assign.kurir');
});

Route::get("/test", function () {
    $phone = '081373660895';
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://graph.facebook.com/v15.0/143406598863323/messages',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
    "messaging_product": "whatsapp",
    "to": ' . $phone . ',
    "type": "template",
    "template": {
        "name": "hello_world",
        "language": {
            "code": "en_US"
        }
    }
}',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer EAAMNNnj2j98BOzlFfspjCkTqqSUtcK0JWmnCYao07Jqg4ZArzE2pmUrmcpNZA7EL6ZB4zWhWtBO6EK56cK0jqI25x0gTGICdMUARCE50AZArrIdeParToQREsZBRnW7LCNW2v69teRM8RVdqSVunbYRuHPU88CsaOft6mCpBjdu7T3QDNf6hnVJjeO8zuj12Mp9ZBiycGcgsXV4ZCkAXZBAZD',
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    dd($response);
});
