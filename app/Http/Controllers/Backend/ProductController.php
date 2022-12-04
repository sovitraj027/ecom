<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Backend\Color;
use App\Models\Backend\Product;
use App\Models\Backend\Set;
use App\Models\Backend\Size;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return view('backend.product.index', [

            'products' => Product::latest()->get(),
            'colors' => Color::latest()->get(),
            'sizes' => Size::latest()->get(),

        ]);
    }

    public function create()
    {
        return view(
            'backend.product.create',
            [
                'colors' => Color::latest()->get(),
                'sizes' => Size::latest()->get(),
                'products' => Product::latest()->get()
            ]
        );
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->except('image', '_token', 'quantity', 'custom', 'size', 'color'));
        if ($request->hasFile('image')) {
            $this->fileUpload($product, 'image', 'product-image', false);
        }

        $quantity = $request->quantity;
        for ($i = 0; $i < count($quantity); $i++) {
            $data = [
                'quantity' => $quantity[$i],
                'custom' => $request->custom,
                'price' => $request->price,
                'product_id' => $product->id,
            ];
        }

        $set=Set::create($data);

        $set->colors()->attach($request->color);
        $set->sizes()->attach($request->color);

        return redirect()->route('products.index')->with('success', 'Size Created Successfully!');;
    }

    public function edit(Product $product)
    {
        return view('backend.product.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('products.index')->with('info', 'Product Updated Successfully!');
    }



    public function destroy(Product $product)
    {
        // $product->sizes()->detach();
        // $product->colors()->detach();
        if ($product->image != null) {

            unlink("storage/product-image/" . $product->image);

            $product->delete();
        }
        $product->delete();

        return redirect()->route('products.index')->with('error', 'Product Deleted Successfully!');
    }

    public function updateStatus(Request $request)
    {
        $product = product::find($request->product_id);
        $product->status = $request->status;
        $product->save();
        return response()->json([
            'success' => true,
            'message' => 'Status changed Successfully.'
        ]);
    }

    public function show($id){
        $product=Product::where('id',$id)->first();
        return view('frontend.product.detail',[
            'product'=>$product
        ]);
    }
}
