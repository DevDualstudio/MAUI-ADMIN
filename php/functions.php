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
		$campoId = $con->getCampoId( $tabla );
		$campoNombre = $con->getCampo( $tabla, 'nombre' );
		if ( ( !is_null( $campoNombre  ) && $campoNombre != '' )  && ( !is_null( $campoId ) && $campoId != '' ) ) {
			try {
				$query = $con->Consulta( 'select ' . $campoNombre . ' from ' . ucfirst( $tabla ) . ' where ' . $campoId . '=' . $id );
				if ( $con->Cuantos( $query ) > 0) {
					$R = $con->Resultados( $query );
					$dato = $R[ $campoNombre ];
				}
			} catch (Exception $e) {
				$query = $con->Consulta( 'select ' . $campoNombre . ' from ' . $tabla . ' where ' . $campoId . '=' . $id );
				if ($con->Cuantos( $query ) > 0) {
					$R = $con->Resultados( $query );
					$dato = $R[ $campoNombre ];
				}
			}
		}
		return $dato;
	}
