<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace Soft\Http\Controllers;

use Soft\Http\Requests;
use Illuminate\Http\Request;
use Soft\User;
use Soft\Producto;
use Soft\Provedore;
use Soft\Venta;
use Auth;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        

        $productos = Producto::count();
        $provedores = provedore::count();
        $Ventas = Venta::count();
        //$customers = Customer::count();
        //$suppliers = Supplier::count();
        //$receivings = Receiving::count();
        //$sales = Sale::count();
        $empleados = User::count();
        return view('admin.index')
           // ->with('items', $items)
            //->with('item_kits', $item_kits)
           // ->with('customers', $customers)
            ->with('Ventas', $Ventas)
            ->with('provedores', $provedores)
            ->with('productos', $productos)
            ->with('empleados', $empleados);
    }

    

    
}