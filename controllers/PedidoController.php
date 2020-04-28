<?php
require_once 'models/pedido.php';
class pedidoController
{
    public function registrar()
    {
        if (isset($_SESSION['verify'])) {
            require_once 'views/pedido/registrar.php';
        } else {
            require_once 'views/usuario/login.php';
        }
    }

    public function guardar()
    {
        
            /* $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $distrito = isset($_POST['distrito']) ? $_POST['distrito'] : false;
            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : false;
            
            if ($direccion && $distrito && $departamento) {
                $pedido = new Pedido();
                $pedido->setDireccion($direccion);
                $pedido->setDistrito($distrito);
                $pedido->setDepartamento($departamento);
                $pedido->setId_usuario($_SESSION['verify']->id);
                $pedido->setId_producto($_SESSION['carrito']->id);
                $pedido->insert();
            } */

            include 'plantilla.php';

            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();

            $pdf->SetFillColor(232, 232, 232);
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(40, 6, 'IMAGEN', 1, 0, 'C', 1);
            $pdf->Cell(40, 6, 'NOMBRE', 1, 0, 'C', 1);
            $pdf->Cell(40, 6, 'PRECIO', 1, 1, 'C', 1);


            /* while ($row = $resultado->fetch_assoc()) {
                $pdf->Cell(70, 6, utf8_decode($row['estado']), 1, 0, 'C');
                $pdf->Cell(20, 6, $row['id_municipio'], 1, 0, 'C');
                $pdf->Cell(70, 6, utf8_decode($row['municipio']), 1, 1, 'C');
            } */
            $pdf->Output();
        
    }
}
