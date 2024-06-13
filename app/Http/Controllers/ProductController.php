<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{

    protected $product;

    public function __construct(ProductService $productService)
    {
        $this->product = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request): RedirectResponse
    {
        $response = $this->product->createProdutc($request);
        if ($response['success']) {
            return redirect()->route('produtos.index')->with('success', $response['message']);
        } else {
            return redirect()->back()->withErrors(['error' => $response['message']])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('products.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id): RedirectResponse
    {
        $response = $this->product->updateProduct($id, $request);

        if ($response['success']) {
            return redirect()->route('produtos.index')->with('success', $response['message']);
        } else {
            return redirect()->route('products.edit', $id)->withErrors(['error' => $response['message']])->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->product->deleteProduct($id);

        if ($response['success']) {
            return redirect()->route('produtos.index')->with('success', $response['message']);
        } else {
            return redirect()->back()->withErrors(['error' => $response['message']])->withInput();
        }        

    }
}
