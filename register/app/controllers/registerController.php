<?PHP

class registerController extends Controller{

    public $controller;
    

function __construct(){

    $this->controller=new Controller();
    $this->controller->view_object->create_view('register');
   
}
function show(){
   

}

function search(){

}


}
?>