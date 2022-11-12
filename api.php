<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=utf-8');
    $_DATA = json_decode(file_get_contents("php://input"));
    $_DATA->SERVIDOR = $_SERVER['HTTP_HOST'];
    settype($_DATA->N, "int");
    // 7. Dados dos números enteros positivos N y D, se dice que D es un 
    // divisor de N si el resto de dividir N entre D es 0. Se dice que un 
    // número N es perfecto si la suma de sus divisores (excluido el propio N) 
    // es N. Por ejemplo 28 es perfecto, pues sus divisores (excluido elv28) 
    // son: 1, 2, 4, 7 y 14 y su suma es 1+2+4+7+14=28. Hacer un organigrama 
    // que dado un número N nos diga si es o no perfecto.

    $D = 1; $S = 0; $P='';
    do{
        if($_DATA->N%$D==0 && $_DATA->N!=$D){
            $S+=$D;
            $P .= $D.'+';
        }
        if($_DATA->N==$D){
            $P = substr($P, 0, -1).'='.$S;
            $_DATA->RESULTADO = $P;
            if($_DATA->N == $S){
                $_DATA->MENSAJE = 'Es perfecto';
            }else{
                $_DATA->MENSAJE = 'No es perfecto';
            }
            break;
        }else{
            $D++;
        }
    }while(true);
    echo json_encode($_DATA,JSON_PRETTY_PRINT);
    
?>