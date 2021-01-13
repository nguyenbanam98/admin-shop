<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Tag;
use App\Brand;
use App\Product;
use App\Category;
use Carbon\Carbon;
use App\ProductImage;
use Illuminate\Support\Str;
use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProductAddRequest;

class AdminProductController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;

    private $product;
    private $brand;

    public function __construct(Product $product, Brand $brand)
    {
        $this->product = $product;
        $this->brand = $brand;
    }

    public function index(Request $request)
    {
        
        $products = Product::latest()->paginate(5);

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        $tags = Tag::all();
        $brands = $this->brand->all();
        return view('admin.product.add', compact('htmlOption', 'tags', 'brands'));
    }

    public function getCategory($parentId)
    {
        $data = Category::all();
        $recusive = new Recusive($data);

        $htmlOption = $recusive->handleRecusive($parentId);

        return $htmlOption;
    }

    public function store(Request $request)
    {
        try {


            DB::beginTransaction();

            $dataProductCreate = [
                'name'        => $request->name,
                'price'       => $request->price,
                'content'     => $request->content,
                'user_id'     => auth()->user()->id,
                'category_id' => $request->category_id,

            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');

            if (!empty($dataUploadFeatureImage)) {

                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            }

            $product = Product::create($dataProductCreate);


            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');

                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }

            // insert product tag
            
            $product->tags()->attach($request->tags);

            DB::commit();

            return redirect()->back()->with('success','Bạn đã thêm dữ liệu thành công');

        } catch (\Throwable $exception) {

            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());

        }

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $htmlOption = $this->getCategory($product->category_id);
        $brands = $this->brand->all();

        $tags = Tag::all();

        return view('admin.product.edit', compact('htmlOption', 'product', 'tags', 'brands'));
    }

    public function update(Request $request, $id)
    {
        
        try {

            DB::beginTransaction();

            $dataProductUpdate = [
                'name'        => $request->name,
                'price'       => $request->price,
                'content'     => $request->content,
                'user_id'     => auth()->user()->id,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,

            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');

            if (!empty($dataUploadFeatureImage)) {

                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            }

            Product::find($id)->update($dataProductUpdate);

            $product = Product::find($id);

            if ($request->hasFile('image_path')) {

                ProductImage::where('product_id', $id)->delete();

                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');

                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }

            // insert product tag

            $product->tags()->sync($request->tags);

            DB::commit();

            return redirect()->route('admin.products.index');

        } catch (\Throwable $exception) {

            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());

        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->product);
    }

    public function client($id)
    {
        $product = Product::findOrFail($id);
        return view('product', compact('product'));
    }


    public function removeProduct()
    {
        $products = Product::onlyTrashed()->paginate(4);

        
        return view('admin.product.remove', compact('products'));
    }

    public function restore($id){

        $product = Product::withTrashed()->where('id', $id)->first();

        $product->restore();

        return redirect()->back()->with('success','Bạn đã khôi phục thành công');
    }
    public function kill($id)
    {
        try {
            $product = $this->product->withTrashed()->where('id', $id)->first();

            $filePath = $product->feature_image_path;                                                         

            if(!empty($filePath)) {
                unlink('.'.$filePath);
            }
        
            $product->forceDelete();

            return response()->json([
                'code'    => 200,
                'message' => 'success'
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code'    => 500,
                'message' => 'fail'
            ], 500);
        }
    }


    public function action($action, $id)
    {
        if ($action) {

            $product = $this->product->findOrFail($id);
            switch ($action) {
                case 'active':
                    $product->active = $product->active ? 0 : 1;
                    $product->save();
                    break;
                case 'hot':
                    $product->hot = $product->hot ? 0 : 1;
                    $product->save();
                    break;
            }
        }

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $products = $this->product->getProductSearch($request);
        if($request->export) {

            $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
            $select = explode(' ', $date);
            $select = implode('-', $select);

            return Excel::download(new ProductExport(), "${select}-products.xlsx");
        }
        return view('admin.product.index', compact('products'));

    }



}
