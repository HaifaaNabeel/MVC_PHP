<?PHP  
include ("../../core/db.php");

class categoryModel{
    public $db;
     
    function __construct(){
        //$this->db=new DB("localhost","store","root","" );
        $this->db=new DB();
    }

    function getData (){
        $cols=array("id","username");
        $tabl=array("user");
        

        echo $this->db
        ->select($cols)
        ->form($tabl)
        //->where("city","=","sanaa")
        //->orwhere("city", "=", "Taiz")
        //->where("city","=","Aden")
        ->build()
        ->execute();

    }
  
}

$cat = new categoryModel();
 $cat->getData();

?>