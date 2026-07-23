<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $product_service
    ) {
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $this->product_service->update($product, $validated);

        return back()->with('success', 'Produto atualizado.');
    }


    public function destroy(int $id)
    {
        $this->product_service->destroy($id);

        return redirect()
            ->back()
            ->with('success', 'Produto removido com sucesso!');
    }
}
