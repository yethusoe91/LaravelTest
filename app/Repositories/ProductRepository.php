<?php
namespace App\Repositories;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository{
    
    private $model;

    public function __construct(Product $model) {
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
    
    public function create(StoreProductRequest $request)
    {
        $data = $request->validated();

        $data['price'] = (int) round(($data['price'] * 100), 0);

        if($request->hasFile('image')){
            
            $imageName = now()->timestamp.'.'.$request->image->extension();  
       
            $request->image->move(public_path('images'), $imageName);

            $data['image'] = $imageName;
        }

        return $this->model->create($data);
    }
    
    public function update(StoreProductRequest $request, $id) 
    {
        $data = $request->validated();

        if($request->has('price')){
            $data['price'] = (int) round(($data['price'] * 100), 0);
        }

        if($request->hasFile('image')){
            
            $imageName = now()->timestamp.'.'.$request->image->extension();  
       
            $request->image->move(public_path('images'), $imageName);

            $data['image'] = $imageName;
        }
        $model = $this->model->find($id);
        $model->update($data);
        
        return $model;
    }
}