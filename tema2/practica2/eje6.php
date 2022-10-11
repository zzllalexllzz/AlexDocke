<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-10 themed-grid-col">
    <div class="p-3 bg-white">

        <?php
        /* Vamos a crear un programa que calcule el IVA de un carrito de la compra. El
carrito será un array bidimensional asociativo de este tipo: (Puedes añadir más
productos y más campos a tu elección)
$carrito = array(
array(“id” => 1234, “nombre” => “PS4”, “precio” => 349.95, “cant” => 2, “iva_r” => 0),
array(“id” => 1235, “nombre” => “iPhone XS”, “precio” => 1249.95, “cant” => 1, “iva_r” => 0),
array(“id” => 1236, “nombre” => “Chocolate”, “precio” => 9.95, “cant” => 5, “iva_r” => 1)
)
Deberéis crear una función llamada subtotal($linea_pedido) que calcule el precio de
cada línea de pedido, multiplicando el precio por la cantidad y aplicando el iva
correspondiente, si iva_r es 0 será del 21% y si iva_r es 1 será del 10%.
Mostrar en una tabla HTML el carrito de la compra (nombre, precio, cantidad y
subtotal). En la última fila aparecerá el total del pedido a pagar.
Se tendrá en cuenta la visualización y el estilo del carrito de la compra resultante.
*/

        $carrito = array(
            array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0),
            array("id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0),
            array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1)
        );
        
        function subTotal($linea_pedido) {
            $totalLinea = 0;
        
            if ($linea_pedido["iva_r"] == 0) {
                $totalLinea = $linea_pedido["precio"] * $linea_pedido["cant"] * 1.21;
            } else if ($linea_pedido["iva_r"] == 1) {
                $totalLinea = $linea_pedido["precio"] * $linea_pedido["cant"] * 1.1;
            } 
        
            return $totalLinea;
        }
        //tabla
        echo "<table class='table table-dark table-striped'>";
        
        echo "<tr>";
        foreach(array_keys($carrito[0]) as $valor){
            if ($valor!="id") {
                echo "<td>".strtoupper($valor)."</td>";
            }
        }
        echo "<td>SUBTOTAL</td>";


        echo "</tr>";

        $total = 0;
        foreach($carrito as $arrayVa) {
            echo "<tr>";
            echo "<td>" . $arrayVa['nombre'] . "</td>";//columna1
            echo "<td>" . $arrayVa['precio'] . "</td>";//columna2
            echo "<td>" . $arrayVa['cant'] . "</td>";//columna3
            
            //columna4
            echo "<td>";
            if ($arrayVa['iva_r'] == 0) {
                echo "21%";
            }else{ 
                echo "10%";
            }
            echo "</td>";
            //columna5
            echo "<td>" . subTotal($arrayVa) . " </td>";
            
            $total = $total+ subTotal($arrayVa);
            
            echo "</tr>";
        }
        //ultima fila total
        echo "<tr><td>Total</td><td>" . $total . " €</td></tr>"; 
     
        echo "</table>";

        ?>

    </div>
</div>
</div>

<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/pie.php");
?>