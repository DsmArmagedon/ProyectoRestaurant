<?php

namespace App\Http\Middleware;

use Closure;

class EntrustMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $action = $request->route()->getAction();               // obtiene la accion : "App\Http\Controllers\HomeController@index"
        $controller = class_basename($action['controller']);    // obtiene el nombre base de la clase : "HomeController@index"
        list($name, $action) = explode('@', $controller);           // explode : {$name : "HomeController" , $action : "index"}        
        $controller = snake_case($name);                  // cambia el valor : "home_controller"        
        $model = str_replace('_controller','',$controller); // valor model = home        
        $model = str_replace("_","-", $model); // Ejemplo si type_document = type-document
        
//        dd($model . ' ' . $name . ' ' . $action);  // Imprime permission controller index
//        dd($request->user()->hasRole('admin'));         // Para saber si el usuario tiene un rol asignado
//        dd($request->user()->can('permission.index'));  // Para saber si el usuario tiene permisos asignados
        
        if ($action == 'store' || $action == 'update' || $action == 'status') {
            if ($action == 'store') {
                $action = 'create';
            } else if ($action == 'update' || $action == 'status') {
                $action = 'edit';
            }
            if (!$request->user()->can($model . '.' . $action)) {
                abort(403);
            }
        } else if ($action == 'index' || $action == 'create' || $action == 'show' || $action == 'destroy') {
            if (!$request->user()->can($model . '.' . $action)) {
                abort(403);
            }
        }

        return $next($request);
    }

}
