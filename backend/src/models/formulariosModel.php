<?php

require_once "dbConnection.php";

class ModeloFormularios
{
    // ------------------Insertar Registro-------------
    static public function mdlRegistro($tabla, $datos)
    {
        $conexion = Conexion::conectar(); 
        $query = "INSERT INTO $tabla (nombre, email, password) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("sss", $datos["nombre"], $datos["email"], $datos["password"]);
        if ($stmt->execute()) {
            return "ok"; 
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $conexion->close();
    }

    // ------------------Seleccionar Registro-----------
    static public function mdlSeleccionarRegistros($tabla, $item = null, $valor = null)
    {
        $conexion = Conexion::conectar();
    
        try {
            if ($item === null && $valor === null) {
                $query = "SELECT * FROM $tabla ORDER BY id DESC";
                $stmt = $conexion->prepare($query);
            } else {
                $query = "SELECT * FROM $tabla WHERE $item = ? ORDER BY id DESC";
                $stmt = $conexion->prepare($query);
                $stmt->bind_param("s", $valor);
            }
    
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($item === null && $valor === null) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return $result->fetch_assoc();
            }
        } catch (Exception $e) {
            die("Error al ejecutar la consulta: " . $e->getMessage());
        } finally {
            $stmt->close();
            $conexion->close();
        }
    }

	// ------------------Actualizar Registro-----------
	static public function mdlActualizarRegistro($tabla, $datos)
    {
        $conexion = Conexion::conectar();
        $query = "UPDATE $tabla SET nombre=?, email=?, password=? WHERE id=?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("sssi", $datos["nombre"], $datos["email"], $datos["password"], $datos["id"]);
        if ($stmt->execute()) {
            return "ok"; 
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    // ------------------Eliminar Registro-----------
    static public function mdlEliminarRegistro($tabla, $valor)
    {
        $conexion = Conexion::conectar(); 
        $query = "DELETE FROM $tabla WHERE id=?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("i", $valor);
        if ($stmt->execute()) {
            return "ok"; 
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}