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
        ->outerJoin("fdf","sfd1","sdfsd1")
        //->where("city","=","sanaa")
        //->orwhere("city", "=", "Taiz")
        //->where("city","=","Aden")
        ->limitF("4","","2")
        ->groupByF("id","jhkhk")
        ->groupByF("user","jhkhk")
        ->orderBy("id" , "ASC")
        ->orderBy("username" , "DESC ")
        ->orderBy("useremail" , "")
        


        ->build();
        //->execute();

    }
  
}

$cat = new categoryModel();
 $cat->getData();

?>