<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function __construct()
    {
        // Aplica o middleware diretamente no controller para admins
        $this->middleware('auth:admin');
    }

    // Outros métodos como index, show, etc.
}
