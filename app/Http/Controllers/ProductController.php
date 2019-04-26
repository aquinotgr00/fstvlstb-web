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

    public function store(Request $request)
    {
        // dd($request->all());
        $files = $request->images;
        $destinationPath = 'products';

        foreach ($files as $key => $file) {
            $unique = uniqid();
            $filePath = $destinationPath.'/'.$unique.'-'.$file->getClientOriginalName();
            $fileimage = Image::make($file)->save($destinationPath.'/'.$file->getClientOriginalName());
            $s3 = \Storage::disk('s3');
            $s3->put($filePath, $fileimage, 'public');
            $files[$key] = $filePath;
            if ($key == 0) {
                $request->request->add(['thumbnail' => $filePath]);
            }
        }

        $product = $this->products->create($request->except('images'));

        foreach ($files as $value) {
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $value
            ]);
        }

        return redirect('/admin/products');

        // dd( array_merge($request->except('images'), ['images' => $files]) );
        // TODO: handle upload images
        // TODO: store new product
    }

    public function show($id)
    {
        $product = $this->products->findOrFail($id);
        return view('admin-page.products-show', compact('product'));
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
