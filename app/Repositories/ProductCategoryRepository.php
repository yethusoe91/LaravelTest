<?php
namespace App\Repositories;

use App\Http\Requests\StoreProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryRepository{
    
    private $model;

    public function __construct(ProductCategory $model) {
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
        return $this->model->findOrFail($id)->delete();
    }
    
    public function create(StoreProductCategoryRequest $request)
    {
        $data = $request->only('name');
        return $this->model->create($data);
    }
    
    public function update(Request $request, $id) 
    {
        $data = $request->only('name');
                
        return $this->model->findOrFail($id)->update($data);
    }
}