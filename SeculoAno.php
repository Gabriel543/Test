<?php 

    function SeculoAno(int $ano){
        $seculo = intval($ano / 100) + 1;
        return $seculo;
    }
?>

<HTML>
    <body>
        <form action="" method="POST">
            <input type="number" name="ano" min="1">
            <input type="submit" name="subButton">
        </form>
        <?php 
            if(isset($_POST['subButton'])){
                $ano = $_POST['ano'];
                if($ano != ""){
                    echo "<h3>Ano " .($ano) ." = século " .(SeculoAno($ano))  ."</h3>";
                }
            }
        ?>
    </body>
</HTML>