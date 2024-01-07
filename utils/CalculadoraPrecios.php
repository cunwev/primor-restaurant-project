<?php
Class CalculadoraPrecios{

    public static function calculadorPrecioPedido($pedidos){
        $precioTotal = 0;
        
        foreach ($pedidos as $pedido){
            $precioTotal += $pedido->getProducto()->getprecio()*$pedido->getCantidad();
        }
        
        return number_format($precioTotal, 2);
    }
}
?>