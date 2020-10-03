<?PHP
class View{

   function create_view($view_name){
       require_once("app/views/".$view_name.".php");

   }



}
?>