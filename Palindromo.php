<?php 

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

    function palindromo(string $text){
        $lenght = strlen($text);
        for($i = 0; $i < $lenght/2 ; $i++){
            if(strcasecmp($text[$i],$text[$lenght - $i - 1])){ 
                return false;
            }
        }
        return true;
    }
?>

<HTML>
    <body>
        <form action="" method="POST">
            <input type="text" name="text">
            <input type="submit" name="subButton">
        </form>
        <h3>
        <?php 
             if(isset($_POST['subButton'])){
                $text = $_POST['text'];
                if($text != ""){
                    if(palindromo($text)){
                        echo $text ." é palindromo";
                    }else{
                        echo $text ." não é palindromo";
                    }
                }
            }
            
        ?>
        </h3>
    </body>
</HTML>