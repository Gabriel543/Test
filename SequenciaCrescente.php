<?php 
session_start();
function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

  function CheckCrescente(array $array){
    for($i = 0;$i < count($array) - 1; $i++){
        if($array[$i] >= $array[$i + 1]){
            return false;
        }
        return true;
      }
  }

  function SequenciaCrescente(array $array){
    $errorCount = 0;
    for($i = 0;$i < count($array) - 1; $i++){
        
        
        if($array[$i] >= $array[$i + 1]){
            $errorCount += 1;
            if($errorCount >= 2){
                return false;
            }
            $novoArrayA = array();
            for($j = 0; $j < count($array);$j++){
                if($j != $i){
                    array_push($novoArrayA,$array[$j]);
                }
            }
            $novoArrayB = array();
            for($j = 0; $j < count($array);$j++){
                if($j != $i + 1){
                    array_push($novoArrayB,$array[$j]);
                }
            }
            if((!CheckCrescente($novoArrayA) or !CheckCrescente($novoArrayB))){
                return false;
            }
        }
      }
      return true;
  }

  function checkEmptyValue(array $array){
    for($i = 0;$i < count($array); $i++){
        if($array[$i] == ""){
            return true;
        }
    }
    return false;
  }

  if(isset($_SESSION["value"])){
      $valor = $_SESSION["value"];
  }else{
      $valor = 2;
  }


?>

<HTML>
    <body>
        <form action="" method="POST">
            <h2>Tamanho do array (min = 2)</h2>
            <input type="number" name="valor" min="1">
            <input type="submit" name="subButton">
        </form>
        
        <form action="" method="POST">
            <h2>Insira os Números</h2>
        
        <?php 
            if(isset($_POST['subButton'])){
                $valor = $_POST['valor'];
                if($valor >= 2 and $valor != ""){
                    $_SESSION['value'] = $valor;
                }else{
                    $valor = $_SESSION['value'];
                }
            }    
            for($i = 0; $i < $valor; $i++) :            
        ?>

        <input type="number" name="number<?php echo $i?>">
        
        <?php  endfor ?>
        <br><br>
        <input type="submit" name="subArray">
        </form>

        <?php 
            if(isset($_POST['subArray'])){
                
                $array = array();
                for($i = 0; $i < $valor; $i++){
                    $num = $_POST['number' .$i];
                    array_push($array,$num);
                }
                if(checkEmptyValue($array)){
                    echo "Algum número não preenchido.";
                }
                else if(SequenciaCrescente($array)){
                    print_r($array);
                    echo "<br>O array é crescente";
                }else{
                    print_r($array);
                    echo "<br>O array não é crescente";
                }
            }
        ?>
        
    </body>
</HTML>