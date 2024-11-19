<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeComponent extends Component {
    public $id ;
    public $name;
    public $productTypes = [] ;
    public $showModal = false ;
    public $editing = false;

    public function fetchData(){
        $this->productTypes = ProductType::orderBy('id', 'desc')->get();

    }
    
    public function create() {
        $this->showModal= true;
    }
    public function save() {
        if ($this->id){
            $productType = ProductType::find($this->id);
        } else{
            $productType = new ProductType();
        }

        $productType->name = $this->name;

        $productType->save();

        $this->fetchData();
        
        $this->showModal = false;
        $this->editing = false;
        
    }
    public function edit($id){
      
        $productType = ProductType::find($id);
        $this->id = $productType->id;
        $this->name = $productType->name;
        $this->editing = true;
        $this->showModal = true;
    }
    public function remove($id){
        $productType = ProductType::find($id);
        $productType->delete();
        $this->fetchData();
    }
    public function render(){
        $this->fetchData();
        return view('livewire.productType');
    }
}




?>