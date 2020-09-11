<?php 

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

    function CalculeArea($valor){
        $area = 1;
        for($i = 0; $i < $valor; $i++){
            $area += 4 * $i;
        }
        console_log($area);
        return $area;
    }

?>

<HTML>
    <body>
        <form action="" method="POST">
            <input type="number" name="valor" min="1">
            <input type="submit" name="subButton">
        </form>
        <h3>
        <?php 
             if(isset($_POST['subButton'])){
                $valor = $_POST['valor'];
                if($valor != ""){
                    echo "A area de valor n = " .($valor) ." é " .(CalculeArea($valor));
                }
            }
            
        ?>
        </h3>
    </body>
</HTML>