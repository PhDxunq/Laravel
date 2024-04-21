<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    //

    public function create()
    {
        $lstCate = Category::all();

        $data = [
            'title' => 'Them san pham moi',
            'lstCate' => $lstCate,
        ];

        return view('admin.product.create', $data);
    }

    public function store(ProductRequest $request)
    {
        // dd($request->all());
        // store file
        $image = $request->file('image');
        $image_name = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads'), $image_name);
        $prd = new Product();
        $prd->name = $request->name;
        $prd->price = $request->price;
        $prd->category_id = $request->category_id;
        $prd->image = $image_name;
        $prd->description = $request->description == null ? '' : $request->description;
        $prd->save();

        return redirect()->route('admin.index')->with('success', 'Thêm sản phẩm thành công');
    }

    public function edit($id)
    {
        $prd = Product::find($id);
        $lstCate = Category::all();
        $data = [
            'title' => 'Chinh sua san pham',
            'prd' => $prd,
            'lstCate' => $lstCate,
        ];
        return view('admin.product.edit', $data);
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $image_name);
                Product::where('id', $id)->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'category_id' => $request->category_id,
                    'image' => $image_name,
                    'description' => $request->description == null ? '' : $request->description,
                ]);
            } else {
                Product::where('id', $id)->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'category_id' => $request->category_id,
                    'description' => $request->description == null ? '' : $request->description,
                ]);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Chỉnh sửa sản phẩm thất bại');
        }

        return redirect()->route('admin.index')->with('success', 'Chỉnh sửa sản phẩm thành công');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
