<?PHP 
 
   require_once("app/config/database.php");
   //include("app/config/database.php");

class DB{

    /*private $conn;
    
     function __construct($server , $dbname, $username, $pass)
    {
        $dsn="mysql:".$server.";dbname".$dbname;

        this->conn= new PDO($dsn,$username,$pass)
    }*/

    public $columns="";
    public $tables="";
    public $cond ="";
    public $final_query="";
    public $conn;
    //private $conn;
    /* function __construct($server,$dbname,$username,$pass)
    {
        $dsn="mysql:host=".$server.";dbname".$dbname;
        $this->conn=new PDO ("mysql:host=".$server.";dbname=".$dbname,$user,$pass);
    }*/

    function __construct(){

        $dsn=dataBase::$driver.':host='.dataBase::$host.';dbname='.dataBase::$dbname;
        try{
            $this->conn=new PDO($dns,dataBase::$username,dataBase::$pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
        }
    

    function select ($cols){
        $this->columns="select ".implode(",",$cols)." " ;

        return $this;
    }

    function form ($tab){
      $this->tables = "from ".implode(",",$tab);
       return $this;
    }

    function where ($con,$oper,$val){
        if (empty($this->cond))
        {
            $this->cond=" where ".$con." ".$oper." ".$val ." ";
        }
 
        else
        {
            $this->cond.="and ".$con." ".$oper." ".$val ." ";
        }
        return $this;
        }

        function orwhere ($con,$oper,$val){
            if (empty($this->cond))
            {
                $this->cond=" where ".$con." ".$oper." ".$val ." ";
            }
     
            else{
                $this->cond.="or ".$con." ".$oper." ".$val ." ";
            }
            return $this;
            }
        function build (){

            //return $this->columns.$this->tables.$this->cond;
            $this->final_query=$this->columns.$this->tables.$this->cond;

            return $this;
            }
            
            function execute (){

                //return $this->columns.$this->tables.$this->cond;
                $this->conn=query($this->final_query);
    
                return $this;
                }

}
?>