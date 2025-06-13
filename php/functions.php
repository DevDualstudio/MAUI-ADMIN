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
		$dato = '';
		$table = $con->getTablaNombre( $tabla );
		$campoId = $con->getCampoId( $table );
		$campoNombre = $con->getCampo( $table, 'nombre' );
		if ( ( !is_null( $campoNombre  ) && $campoNombre != '' )  && ( !is_null( $campoId ) && $campoId != '' ) ) {
			$query = $con->Consulta( 'select ' . $campoNombre . ' from ' . $table . ' where ' . $campoId . '=' . $id );
			if ( $con->Cuantos( $query ) > 0) {
				$R = $con->Resultados( $query );
				$dato = $R[ $campoNombre ];
			}
		}
		return $dato;
	}
