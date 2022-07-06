<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $repo;

    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $results = $this->repo->all()->with('category')->paginate();
        
        return ProductResource::collection($results);
    }

    public function store(StoreProductRequest $request)
    {
        $this->repo->create($request);
        
        return response("Successfully created");
    }

    public function show($id)
    {
        $results = $this->repo->getById($id);

        $results->load('category');
                
        return new ProductResource($results);
    }

    public function update(StoreProductRequest $request,$id)
    {
        $this->repo->update($request,$id);

        return response("Successfully updated");
    }

    public function destroy($id)
    {
        $response = $this->repo->delete($id);

        return response()->json($response);
    }
}
