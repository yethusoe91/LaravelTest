<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Resources\ProductCategoryResource;
use App\Models\Product;
use App\Repositories\ProductCategoryRepository;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    private $repo;

    public function __construct(ProductCategoryRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $results = $this->repo->all()->paginate();
        
        return ProductCategoryResource::collection($results);
    }

    public function store(StoreProductCategoryRequest $request)
    {
        $response = $this->repo->create($request);

        return response()->json($response);
    }

    public function show($id)
    {
        $results = $this->repo->getById($id);
                
        return new ProductCategoryResource($results);
    }

    public function update(Request $request,$id)
    {
        $this->repo->update($request,$id);

        return response("successfully updated");
    }

    public function destroy($id)
    {
        $this->repo->delete($id);

        return response("successfully deleted");
    }
}
