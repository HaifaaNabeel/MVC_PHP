<?PHP

class helloController extends Controller{

    public $controller;
    

function __construct(){

    $this->controller=new Controller();
    $this->controller->view_object->create_view('hello');
   
}
function show(){
   

}

function search(){

}


}
?>