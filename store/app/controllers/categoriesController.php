<?PHP

class categoriesController extends Controller{

    public $controller;
    

function __construct(){

    $this->controller=new Controller();
    $this->controller->view_object->create_view('categories');
  
}
function show(){
   

}

function search(){

}


}
?>