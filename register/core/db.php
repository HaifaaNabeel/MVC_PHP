<?PHP 
 
   //require_once("../app/config/database.php");
   //include("app/config/database.php");
   //include ("../app/config/database.php");


class DB{
    public $conn;
    public $columns="";
    public $tables="";
    public $cond ="";
    public $final_query="";
    public $ordBy="";
    public $groupBy="";
    public $limit="";
    public $innJoin="";
    public $leftJoin="";
    public $outJoin="";

   

    function __construct(){

         try{
            $this->conn = new PDO("mysql:host=localhost;dbname=registerdb;charset=utf8;","root","");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            //$m="select * from user ";
            
            
        } 
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        }
    

    function select ($cols){

        if (empty($this->columns))
        {
            $this->columns=" select * " ;
        }
     
        else{
            $this->columns=" select ".implode(",",$cols)." " ;
        }
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

    function groupByF ($groCo,$growa){
        if (empty($this->groupBy))
            $this->groupBy=" GROUP BY ".$groCo." ".$growa." ";
        else
            $this->groupBy.=" , ".$groCo." ".$growa." ";
            return $this;
    }

    function orderBy ($orCo,$orwa){
        if (empty($this->ordBy))
           $this->ordBy=" order by ".$orCo." ".$orwa." ";
        else
           $this->ordBy.=", ".$orCo." ".$orwa." ";
        return $this;
    }

    function limitF ($con1,$oper,$con2){
        if (empty($this->limit))
            $this->limit=" limit ".$con1." ".$oper." ".$con2;
        else
        $this->limit.=" , ".$con1." ".$oper." ".$con2;
        return $this;
    }

    function innerJoin ($tab,$con1,$con2){
        $this->innJoin=" Inner join ".$tab." on ".$con1." = ".$con2." ";
        return $this;
    }
    function leftJoin ($tab,$con1,$con2){
        $this->leftJoin=" left join ".$tab." on ".$con1." = ".$con2." ";
        return $this;
    }
    function outerJoin ($tab,$con1,$con2){
        $this->outJoin=" full outer join ".$tab." on ".$con1." = ".$con2." ";
        return $this;
    }



    function insert($tbl,$items){
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $values=array();
        foreach(array_values($items)as $item){
            $values[]="'".$item."'";
        }
       try{
        $this->final_query="insert into ".$tbl."(".implode(",",array_keys($items)).") values (".implode(",",$values).")";
        
        $stmt=$this->connection->prepare($this->final_query);
        $stmt->execute();
        echo $this->final_query;
       }catch(Exception $ex){
           
           echo $ex->getMessage();
       }
        return $this;

    }


    function build (){

            //return $this->columns.$this->tables.$this->cond.$this->groupBy.$this->ordBy;
            //return $this->columns.$this->tables.$this->leftJoin.$this->outJoin;
            //return $this->final_query=$this->columns.$this->tables;
            $this->final_query=$this->columns.$this->tables.$this->cond.$this->ordBy;

            return $this;
    }
            
    function execute (){
                 //echo  $this->final_query;
                //return $this->columns.$this->tables.$this->cond;
                //$th=$this->conn=prepare($this->final_query);
                //$th->execute();
                //$this->conn=query("select * from user");
                $sql = $this->conn->prepare($this->final_query);
                $sql->execute(array());
                $c = $sql->fetchAll(PDO::FETCH_BOTH);
                print_r($c);

   
                return $this;
    }

}
?>