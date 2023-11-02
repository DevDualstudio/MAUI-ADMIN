<?php
    function palabraDiccionario( $palabra, $con ) {
		$texto = preg_replace( '/(?<!\ )[A-Z]/', ' $0', $palabra );
		$Query = $con->Consulta( 'select * from diccionario' );
		while( $U = $con->Resultados( $Query ) ) {
			if ( strtoupper( $palabra ) == strtoupper( $U[ 'campo' ] ) ) {
				$texto = $U[ 'etiqueta' ];
			}
		}
		return $texto;
	}
	function obtenCatalogo( $tabla, $id, $con ) {
		$campoId = $con->getCampoId( $tabla );
		$campoNombre = $con->getCampo( $tabla, 'nombre' );
		$query = $con->Consulta( 'select ' . $campoNombre . ' from ' . $tabla . ' where ' . $campoId . '=' . $id );
		$R = $con->Resultados( $query );
		return $R[ $campoNombre ];
	}
