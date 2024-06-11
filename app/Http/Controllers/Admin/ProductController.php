<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Product\CreateFormRequest;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Http\Services\Menu\MenuService;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ProductAdminService $ProductAdminService)
    {
        $this->productAdminService = $ProductAdminService;
    }
    public function index()
    {
       return view('admin.product.list', [
        'title' => 'Danh sách sản phẩm',
        'products' => $this->productAdminService->get()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(MenuService $menuService)
    {
        $this->menuService = $menuService;
        return view('admin.product.add', [
            'title' => 'Thêm sản phẩm mới',
            'menus' => $this->menuService->getParent()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->productAdminService->insert($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, MenuService $menuService)
    {
        $this->menuService = $menuService;
        return view('admin.product.edit', [
            'title' => 'Chỉnh sửa sản phẩm',
            'product' => $product,
            'menus' => $this->menuService->getParent()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $result = $this->productAdminService->update($request, $product);
        if($result){
            return redirect('/admin/flights/list');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = $this->productAdminService->delete($request);

        if($request) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
