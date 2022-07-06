<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartItemRequest;
use App\Http\Resources\CartItemsResource;
use App\Repositories\CartItemRepository;

class CartItemController extends Controller
{
    private $repo;

    public function __construct(CartItemRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $results = $this->repo->all()->with(['product'])->paginate();
        
        return CartItemsResource::collection($results);
    }

    public function store(CartItemRequest $request)
    {
        $this->repo->create($request);

        return response("successfully created");
    }

    public function show($id)
    {
        $results = $this->repo->getById($id);
        
        $results->load(['product']);

        return new CartItemsResource($results);
    }

    public function update(CartItemRequest $request,$id)
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
