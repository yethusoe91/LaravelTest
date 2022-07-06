<?php
namespace App\Repositories;

use App\Http\Requests\CartItemRequest;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemRepository{
    
    private $model;

    public function __construct(CartItem $model) {
        $this->model = $model;
    }
    
    public function all() 
    {
        return $this->model;
    }
    
    public function getById($id) 
    {
        return $this->model->findOrFail($id);
    }
    
    public function delete($id) 
    {
        return $this->model->find($id)->delete();
    }
    
    public function create(CartItemRequest $request)
    {
        $data = $request->only('product_id');
        return $this->model->create($data);
    }
    
    public function update(CartItemRequest $request, $id) 
    {
        $data = $request->only('product_id');
                
        return $this->model->find($id)->update($data);
    }
}