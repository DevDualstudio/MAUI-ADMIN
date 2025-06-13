<?php

require_once "connection.php";
require_once "functions.php";

class GeneralModel
{
    public function mdlInsertaItem( $tabla, $data )
    {
        $con =  new MauiConnection();
        $con->OpenConnection();
        $result = $con->insertaDatos( $tabla, $data );
        if ( $result ) {
            $id_nuevo = $con->Ultimo();
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Item Registrado Exitosamente.';
            $respuesta['data'] = $id_nuevo;
        } else {
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del item falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    public function mdlActualizaItem( $tabla, $data )
    {
        $con =  new MauiConnection();
        $con->OpenConnection();
        $campoId = $con->getCampoId( $tabla );
		$result = $con->actualizaDatos( $tabla, $data, $data[ $campoId ] );
        if ( $result ) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Item Actualizado Exitosamente.';
            $respuesta['data'] = $data[ $campoId ];
        } else {
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del item falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    public function mdlEliminaItem( $tabla, $data )
    {
        $con =  new MauiConnection();
        $con->OpenConnection();
        $result = $con->borraDatos( $tabla, $data );
        if ( $result ) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Item Eliminado Exitosamente.';
            $respuesta['data'] = '';
        } else {
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del item falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    public function mdlEliminaItemCampo( $tabla, $data )
    {
        $con =  new MauiConnection();
        $con->OpenConnection();
        $result = $con->Consulta( 'delete from ' . $tabla . ' where ' . $data[ 'campo' ] . '=' . $data[ 'id' ] );
        if ( $result ) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Item Eliminado Exitosamente.';
            $respuesta['data'] = '';
        } else {
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del item falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    public function mdlMostrarItem($tabla, $Id)
    {
        $con =  new MauiConnection();
        $con->OpenConnection();
        $campoId = $con->getCampoId( $tabla );
        $sql = "SELECT * FROM $tabla WHERE $campoId=$Id;";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Item Encontrado Exitosamente.';
            $respuesta['data'] = $row;
        } else {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'Empty';
            $respuesta['description'] = "No hay información actualmente";
            $respuesta['detail'] = "No se encontró el item";
            $respuesta['data'] = array();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    public function mdlListaItems($tabla)
    {
        $con =  new MauiConnection();
        $con->OpenConnection();
        $data = array();
        $table = $con->getTablaNombre( $tabla );
        $campoId = $con->getCampoId( $table );
        $sql = "SELECT * FROM $table";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while( $R = $con->Resultados( $result ) ) {
                $info = array();
                foreach( $R as $index => $dato ) {
                    $comment = $con->getComentario( $tabla, $index );
                    if ( preg_match('/\bopciones\b/', $comment ) ) {
                        $tablaCatalogo = explode( '=', $comment )[1];
                        $info[ $index ] = obtenCatalogo( $tablaCatalogo, $dato, $con );
                    } else {
                        $info[ $index ] = $dato;
                    }
                }
                $info[ 'action' ] = '<div><button class="btn btn-mprimary-100 text-light" onclick="editaItem( ' . $R[ $campoId ] . ' )">Editar</button><button class="btn btn-msecondary-100 text-light" onclick="eliminaItem( ' . $R[ $campoId ] . ' )">Borrar</button></div>';
                $data[] = $info;
            }
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Items Encontrados Exitosamente.';
            $respuesta['data'] = $data;
        } else {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'Empty';
            $respuesta['description'] = "No hay información actualmente";
            $respuesta['detail'] = "No se encontró el item";
            $respuesta['data'] = array();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    public function mdlListaItemsFiltro($tabla, $campo)
    {
        $con =  new MauiConnection();
        $con->OpenConnection();
        $data = array();
        $table = $con->getTablaNombre( $tabla );
        $campoId = $con->getCampoId( $table );
        $sql = "SELECT * FROM $table WHERE " . $campo['campo'] . "=" . $campo['id'];
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while( $R = $con->Resultados( $result ) ) {
                $data[] = $R;
            }
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Items Encontrados Exitosamente.';
            $respuesta['data'] = $data;
        } else {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'Empty';
            $respuesta['description'] = "No hay información actualmente";
            $respuesta['detail'] = "No se encontró el item";
            $respuesta['data'] = array();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    public function mdlListaOptions( $tabla ) {
        $con =  new MauiConnection();
        $con->OpenConnection();
        $data = array();
        $table = $con->getTablaNombre( $tabla );
        $campoId = $con->getCampoId( $table );
        $campoNombre = $con->getCampo( $table, 'nombre' );
        $sql = "SELECT " . $campoId . "," . $campoNombre . " FROM $table";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while( $R = $con->Resultados( $result ) ) {
                $data[ $R[ $campoId ] ] = $R[ $campoNombre ];
            }
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Items Encontrados Exitosamente.';
            $respuesta['data'] = $data;
        } else {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'Empty';
            $respuesta['description'] = "No hay información actualmente";
            $respuesta['detail'] = "No se encontró el item";
            $respuesta['data'] = array();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    public function mdlArmaTabla($tabla)
    {
        $columnas = array();
        $con =  new MauiConnection();
        $con->OpenConnection();
        $table = $con->getTablaNombre( $tabla );
        $sql = 'select COLUMN_COMMENT as comentarios, if ( COLUMN_KEY = "PRI", "S", "N" ) as esLlave, DATA_TYPE as tipoDatos, COLUMN_NAME as columna, if( IS_NULLABLE="NO", "S", "N" ) as obligatoria, COLUMN_DEFAULT as valorDefault, CHARACTER_MAXIMUM_LENGTH as tamano from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA="' . $con->getDataBaseName() . '" and TABLE_NAME="' . $table . '" order by ORDINAL_POSITION asc';
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $columnas[] = 'ID'; 
            while( $R = $con->Resultados( $result ) ) {
                if ( $R[ 'esLlave' ] == 'N' ) {
                    if ( preg_match('/\bopciones\b/', $R[ 'comentarios' ] ) ) {
                        $tablaCatalogo = explode( '=', $R[ 'comentarios' ] )[1];
                        if ( $R[ 'columna' ] == $con->getCampoId( $tablaCatalogo ) ) {
                            $titulo = palabraDiccionario( $tablaCatalogo, $con );
                        } else {
                            $titulo = palabraDiccionario( $R[ 'columna' ], $con );
                        }
                    } else {
                        $titulo = palabraDiccionario( $R[ 'columna' ], $con );					
                    }
                    $columnas[] = ucfirst( $titulo ); 
                }
            }
            $columnas[] = 'Acciones';
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Tabla armada con éxito';
            $respuesta['data'] = $columnas;
        } else {
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar los campos de la tabla";
            $respuesta['detail'] = "No se encontró la tabla";
        }
        $con->CierraConexion();
        return $respuesta;
    }
}
