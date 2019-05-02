<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductImage;
use DataTables;
use Image;

class ProductController extends Controller
{
    //TODO: CRUD PRODUCTS
    protected $products;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $products)
    {
        $this->middleware('auth');
        $this->products = $products;
    }

    /**
     * Show the application dashboard of member page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin-page.products');
    }

    public function create()
    {
        return view('admin-page.products-create');
    }

    private function handleUploadImages($files)
    {
        $destinationPath = 'products';

        foreach ($files as $key => $file) {
            $unique = uniqid();
            $filePath = $destinationPath.'/'.$unique.'-'.$file->getClientOriginalName();
            $fileimage = Image::make($file)->save($destinationPath.'/'.$file->getClientOriginalName());
            $s3 = \Storage::disk('s3');
            $s3->put($filePath, $fileimage, 'public');
            $files[$key] = $filePath;
            if ($key == 0) {
                $files['thumbnail'] =  $filePath;
            }
        }

        return $files;
    }

    public function store(Request $request)
    {
 
        $files = $this->handleUploadImages($request->images);
        $request->request->add(['thumbnail' => $files['thumbnail']]);
        unset($files['thumbnail']);
       
        $product = $this->products->create($request->except('images'));

        foreach ($files as $key => $value) {
            $productImg = ProductImage::create([
                'product_id' => $product->id,
                'image' => $value
            ]);
        }

        return redirect('/admin/products');
    }

    public function show($id)
    {
        $product = $this->products->findOrFail($id);
        return view('admin-page.products-show', compact('product'));
    }

    public function destroy($id)
    {
        $this->products->destroy($id);
        return redirect()->route('admin.product.page');
    }

    private function handleProductImages($id)
    {
        // delete the existing product images
        $images = \App\ProductImage::where('product_id', $id)->delete();
    }

    public function update(Request $request, $id)
    {
        $product = $this->products->findOrFail($id);
        if (isset($request->images)) {
            if ( isset($request->images[0]) ) {
                $this->handleProductImages($id);
                $files = $this->handleUploadImages($request->images);
                $request->request->add(['thumbnail' => $files['thumbnail']]);
                unset($files['thumbnail']);
            } else if ( !isset($request->images[0]) ) {
                $files = $this->handleUploadImages($request->images);
            }
            foreach ($files as $key => $value) {
                ProductImage::create([
                    'product_id' => $id,
                    'image' => $value
                ]);
            }
        }

        $product->update($request->all());
        return redirect(route('admin.product.show', $id));
    }

    /**
     * get list data from products
     *
     * @return mixed
     */
    public function listData(Request $request)
    {
    	$data = $this->products->get();
    	return DataTables::of($data)
            ->editColumn('id', '{!! sprintf("%06d", $id)!!}')
            ->editColumn('created_at', '{!! date("d-m-Y", strtotime($created_at))!!}')
            ->make(true);
    }
}
