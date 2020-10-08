<?PHP
class Route{

    function __construct($url){

        $clean_url=rtrim($url,'/');
        $clean_url=explode('/',$clean_url);
        echo $clean_url[0];



        $rquestedController=$clean_url[0]."Controller";

        include("app/controllers/".$rquestedController.".php");
        
        
        new $rquestedController();


    }

}
?>