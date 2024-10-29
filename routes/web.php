<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAdminController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\PaymentController;



Route::get('/', function () {
    return view('index');
});

Route::get('/nossa_loja', function () {
    return view('nossa_loja');
});

Route::get('/contato_loja', function () {
    return view('contato_loja');
});

Route::get('/teste', function () {
    return view('teste');
});

Route::get('/carrinho', function () {
    return view('carrinho');
});

Route::post('/init-payment', [PaymentController::class, 'initPayment'])->name('init.payment');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/failure', [PaymentController::class, 'failure'])->name('payment.failure');
Route::get('/payment/pending', [PaymentController::class, 'pending'])->name('payment.pending');



// Rotas de login

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

// Rotas de cadastro
Route::get('/login_cadastro', [UserController::class, 'showRegisterForm'])->name('register.form'); // Altere aqui para '/cadastro'
Route::post('/login_cadastro', [UserController::class, 'register'])->name('register'); // Altere aqui para '/cadastro'



Route::get('/login_adm', [UserAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login_adm', [UserAdminController::class, 'login']);
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');




Route::get('/categoria', [ CategoriaController::class, 'index' ]);
Route::get("/categoria/exc/{id}", [ CategoriaController::class, 'ExcluirCategoria' ])->name('categoria_ex');
Route::get("/categoria/upd/{id}", 
    [ CategoriaController::class, 'BuscarAlteracao' ]
)->name('categoria_upd');



Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/useradmin', [UserAdminController::class, 'index'])->name('useradmin.index');
    Route::get('/useradmin/create', [UserAdminController::class, 'create'])->name('useradmin.create');
    Route::post('/useradmin/store', [UserAdminController::class, 'store'])->name('useradmin.store');
    Route::get('/useradmin/edit/{id}', [UserAdminController::class, 'edit'])->name('useradmin.edit');
    Route::put('/useradmin/update/{id}', [UserAdminController::class, 'update'])->name('useradmin.update');
    Route::delete('/useradmin/delete/{id}', [UserAdminController::class, 'destroy'])->name('useradmin.destroy');

    Route::get('/userusuario', [UserController::class, 'index'])->name('useradmin.index');



    Route::post('/categoria', [ CategoriaController::class, 'IncluirCategoria' ]);
    Route::post('/categoria/upd', [ CategoriaController::class, 'ExecutaAlteracao' ]);

    Route::get('/produtos',
        [ProdutoController::class,'index']
    )->name('produtos_index');

    Route::post('/produtos',
        [ProdutoController::class,'salvarNovoProduto']
    )->name('novo_produto');




});



// Rota para o painel de usuário
Route::get('/user', function () {
    return view('user_layout'); // Exibe a view do painel do usuário
});




