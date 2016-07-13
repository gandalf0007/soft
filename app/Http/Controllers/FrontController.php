<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;
use Auth;
use Counter;
use Soft\User;
use Soft\Producto;
use Soft\Provedore;
use Soft\Venta;


class FrontController extends Controller
{


    public function __construct()
    {
       
        
    }


    public function index()
    {
       //retornando una vista
        return view ('shop.faq');
    }
    
    public function welcome()
    {
       //retornando una vista
        return view ('welcome');
    }

    
     public function shop()
    {
       //retornando una vista
        return view ('shop.home');
    }

    public function admin()
    {
        $activities =Counter::showAndCount('/');
        $Ventas = Venta::count();
        $provedores = provedore::count();
        $productos = Producto::count();
        $empleados = User::count();
        //$customers = Customer::count();
        //$suppliers = Supplier::count();
        //$receivings = Receiving::count();
        //$sales = Sale::count();
       
        return view('admin.index')
           // ->with('items', $items)
            //->with('item_kits', $item_kits)
            ->with('activities', $activities)
            ->with('Ventas', $Ventas)
            ->with('provedores', $provedores)
            ->with('productos', $productos)
            ->with('empleados', $empleados);
    }
    
}
