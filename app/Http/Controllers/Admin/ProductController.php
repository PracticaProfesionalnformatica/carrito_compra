<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products')); // listado 
    }

    public function create() 
    {
        $categories = Category::orderby('name')->get();
    	return view('admin.products.create')->with(compact('categories')); // formulario registro
    }

    public function store(Request $request)
    {
    	// validar 
    	$messages = [
    		'name.required' => 'Es necesario ingresar un nombre para el producto', 
    		'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
    		'description.required' => 'La descripción corta es un campo obligatorio',
    		'description.max' => 'la descripción corta solo admite hasta 200 caracteres',
    		'price.required' => 'Es obligatorio definer precio para el producto',
    		'price.numeric' => 'Ingrese un precio válido',
    		'price.min' => 'No se admiten valores negativos'


    	];
    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'

    	];
    	$this->validate($request, $rules, $messages);

    	// registrtar un nuevo producto en la bd
    	// dd($request->all());
    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
    	$product->save(); // insert

    	return redirect('/admin/products');

    }


       public function edit($id) 
    {
        $categories = Category::orderby('name')->get();
    	$product = Product::find($id);
    	return view('admin.products.edit')->with(compact('product', 'categories')); // formulario registro
    }

    public function update(Request $request, $id)
    {
    	$messages = [
    		'name.required' => 'Es necesario ingresar un nombre para el producto', 
    		'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
    		'description.required' => 'La descripción corta es un campo obligatorio',
    		'description.max' => 'la descripción corta solo admite hasta 200 caracteres',
    		'price.required' => 'Es obligatorio definer precio para el producto',
    		'price.numeric' => 'Ingrese un precio válido',
    		'price.min' => 'No se admiten valores negativos'


    	];
    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'

    	];
    	$this->validate($request, $rules, $messages);



    	// actualizar  producto en la bd
    	// dd($request->all());
    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
    	$product->save(); // insert

    	return redirect('/admin/products');

    }

     public function destroy($id)
    {
    	// registrtar un nuevo producto en la bd
    	// dd($request->all());
    	$product = Product::find($id);
    	$product->delete(); // insert

    	return back();

    }
}
