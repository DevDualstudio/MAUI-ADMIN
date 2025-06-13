<?php
class MauiConnection
{
	public $conexion;
	private $database;
	private $server;
	private $user;
	private $pass;
	public function __construct() {
		/* $this->server='maui-database.cv7x0hw15acc.us-east-2.rds.amazonaws.com';
		$this->user = 'root';
		$this->pass = 'BDDMySQL.L8M4utg8302YpdRZ6b9O.MAUI2022';
		$this->database = 'MAUI';
		$this->conexion = mysqli_connect( $this->server, $this->user, $this->pass, $this->database ); */
        $this->server='localhost';
		$this->user = 'root';
		$this->pass = '';
		$this->database = 'maui';
		$this->conexion = mysqli_connect( $this->server, $this->user, $this->pass, $this->database );
	}
	public function OpenConnection()
	{
		/* $conn = mysqli_connect("maui-database.cv7x0hw15acc.us-east-2.rds.amazonaws.com", "devwebmaui", "Abcde.12345", "MAUI"); */
		$this->conexion = mysqli_connect( $this->server, $this->user, $this->pass, $this->database );
		if ( $this->conexion ) {
			mysqli_set_charset( $this->conexion, 'utf8' );
			return true;
		} else {
			return mysqli_error();
		}
	}
	public function Consulta( $query ) {
		$res = mysqli_query( $this->conexion, $query );
		return $res;
	}
	public function Resultados( $res ) {
		$result = mysqli_fetch_assoc( $res );
		return $result;
	}
	public function Ultimo() {
		$res = mysqli_insert_id( $this->conexion );
		return $res;
	}
	public function Cuantos( $res ) {
		$dato = mysqli_num_rows( $res );
		return $dato;
	}
	public function GetDataBaseName() {
		return $this->database;
	}
	public function CierraConexion() {
		mysqli_close( $this->conexion );
	}
	public function MuestraError() {
		mysqli_error( $this->conexion );
	}
	 public function getTablaNombre( $tabla ) {
		$res = $this->Consulta( 'select TABLE_NAME as tabla from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA="' . $this->database . '" and ( TABLE_NAME="' . $tabla . '" or TABLE_NAME="' . strtolower( $tabla ) . '" or TABLE_NAME="' . ucfirst( $tabla ) . '" )' );
		$R = $this->Resultados( $res );
		return $R[ 'tabla' ];
	}
	function getCampoId( $tabla ) {
        $table = $this->getTablaNombre( $tabla );
		$str = 'select COLUMN_NAME as columna from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA="' . $this->getDataBaseName() . '" and TABLE_NAME="' . $table . '" and COLUMN_KEY = "PRI"';
		$res = $this->Consulta( $str );
		while( $R = $this->Resultados( $res ) ) {
			return $R[ 'columna' ];
		}
		return false;
	}
	public function getCampo( $tabla, $campo ) {
        $table = $this->getTablaNombre( $tabla );
		$res = $this->Consulta( 'select COLUMN_NAME as columna from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA="' . $this->database . '" and TABLE_NAME="' . $table . '" and COLUMN_COMMENT="' . $campo. '"' );
		$R = $this->Resultados( $res );
		return $R[ 'columna' ];
	}
    public function getComentario( $tabla, $campo ) {
        $table = $this->getTablaNombre( $tabla );
		$res = $this->Consulta( 'select COLUMN_COMMENT as comentario from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA="' . $this->database . '" and TABLE_NAME="' . $table . '" and COLUMN_NAME="' . $campo. '"' );
		$R = $this->Resultados( $res );
		return $R[ 'comentario' ];
	}
	public function escapaTexto( $texto ) {
		return mysqli_real_escape_string( $this->conexion, $texto );
	}
	public function insertaDatos( $tabla, $datos ) {
        $strQuery = 'insert into ' . $tabla . ' ';
        $camposQuery = '';
        $datosQuery = '';
        $campoId = $this->getCampoId( $tabla );
        $campos = $this->getCamposAll( $tabla );
        foreach( $campos as $key => $campo ) {
            if ( $campo[ 'esLlave' ] == 'N' ) {
                if ( isset( $datos[ $key ] ) ) {
                    $camposQuery = ( $camposQuery == '' ) ? $key : $camposQuery . ', ' . $key;
                    if ( $campo[ 'tipo' ] == 'varchar' || $campo[ 'tipo' ] == 'date' || $campo[ 'tipo' ] == 'datetime' || $campo[ 'tipo' ] == 'text' || $campo[ 'tipo' ] == 'char' || $campo[ 'tipo' ] == 'mediumtext' || $campo[ 'tipo' ] == 'longtext' ) {
                        $valor = ( $campo[ 'comentario' ] == 'pass' ) ? $datos[ $key ] : $datos[ $key ];
                        $datosQuery = ( $datosQuery == '' ) ? '"' . $valor . '"' : $datosQuery . ', "' . $valor . '"';
                    } else {
                        $datosQuery = ( $datosQuery == '' ) ? $datos[ $key ] : $datosQuery . ', ' . $datos[ $key ];
                    }
                } else {
                    if ( $campo[ 'required' ] == 'S' ) {
                        $camposQuery = ( $camposQuery == '' ) ? $key : $camposQuery . ', ' . $key;
                        if ( $campo[ 'default' ] != null ) {
                            if ( $campo[ 'tipo' ] == 'date' || $campo[ 'tipo' ] == 'datetime' || $campo[ 'tipo' ] == 'varchar' || $campo[ 'tipo' ] == 'text' || $campo[ 'tipo' ] == 'char' || $campo[ 'tipo' ] == 'mediumtext' || $campo[ 'tipo' ] == 'longtext' ) {
                                $datosQuery = ( $datosQuery == '' ) ? '"' . $campo[ 'default' ] . '"' : $datosQuery . ', "' . $campo[ 'default' ] . '"';
                            } else {
                                $datosQuery = ( $datosQuery == '' ) ? $campo[ 'default' ] : $datosQuery . ', ' . $campo[ 'default' ];
                            }
                        } else {
                            if ( $campo[ 'tipo' ] == 'date' || $campo[ 'tipo' ] == 'datetime' ) {
                                $fecha = ( $campo[ 'tipo' ] == 'date' ) ? 'Curdate()' : 'now()';
                                $datosQuery = ( $datosQuery == '' ) ? '"' . $fecha . '"' : $datosQuery . ', "' . $fecha . '"';
                            } else if ( $campo[ 'tipo' ] == 'varchar' || $campo[ 'tipo' ] == 'text' || $campo[ 'tipo' ] == 'char' || $campo[ 'tipo' ] == 'mediumtext' || $campo[ 'tipo' ] == 'longtext' ) {
                                $datosQuery = ( $datosQuery == '' ) ? '""' : $datosQuery . ', ""';
                            } else {
                                $datosQuery = ( $datosQuery == '' ) ? '0' : $datosQuery . ', 0';
                            }
                        }
                    }
                }
            }
        }
        $strQuery .= '( ' . $camposQuery . ' ) values( ' . $datosQuery . ' )';
        $res = $this->Consulta( $strQuery );
        if ( $res ) { return true; }
        return false;
    }
    public function actualizaDatos( $tabla, $datos, $id ) {
        $strQuery = 'update ' . $tabla . ' set ';
        $camposQuery = '';
        $campoId = $this->getCampoId( $tabla );
        $campos = $this->getCamposAll( $tabla );
        foreach( $campos as $key => $campo ) {
            if ( $campo[ 'esLlave' ] == 'N' ) {
                if ( isset( $datos[ $key ] ) ) {
                    if ( $campo[ 'tipo' ] == 'varchar' || $campo[ 'tipo' ] == 'date' || $campo[ 'tipo' ] == 'datetime' || $campo[ 'tipo' ] == 'text' || $campo[ 'tipo' ] == 'char' || $campo[ 'tipo' ] == 'mediumtext' || $campo[ 'tipo' ] == 'longtext' ) {
                        if ( $campo[ 'comentario' ] == 'pass' ) {
                            $camposQuery = ( $camposQuery == '' ) ? $key . ' = "' . $datos[ $key ] . '"' : $camposQuery . ', ' . $key . ' = "' . $datos[ $key ] . '"';
                        } else if ( $campo[ 'comentario' ] == 'email' || $campo[ 'comentario' ] == 'fecha' ) {
                            $camposQuery = ( $camposQuery == '' ) ? $key . ' = "' . $datos[ $key ] . '"' : $camposQuery . ', ' . $key . ' = "' . $datos[ $key ] . '"';
                        } else if ( $campo[ 'comentario' ] == 'html' ) {
                            $camposQuery = ( $camposQuery == '' ) ? $key . ' = "' . htmlentities( $datos[ $key ] ) . '"' : $camposQuery . ', ' . $key . ' = "' . htmlentities( $datos[ $key ] ) . '"';
                        } else {
                            $camposQuery = ( $camposQuery == '' ) ? $key . ' = "' . $this->escapaTexto( $datos[ $key ] ) . '"' : $camposQuery . ', ' . $key . ' = "' . $this->escapaTexto( $datos[ $key ] ) . '"';
                        }
                    } else {
                        $camposQuery = ( $camposQuery == '' ) ? $key . ' = ' . $datos[ $key ] : $camposQuery . ', ' . $key . ' = ' . $datos[ $key ];
                    }
                } else {
                    if ( $campo[ 'required' ] == 'S' ) {
                        if ( $campo[ 'tipo' ] == 'date' || $campo[ 'tipo' ] == 'datetime' ) {
                            $fecha = ( $campo[ 'tipo' ] == 'date' ) ? 'Curdate()' : 'now()';
                            $camposQuery = ( $camposQuery == '' ) ? $key . '= "' . $fecha . '"' : ', ' . $key . '= "' . $fecha . '"';
                        } else if ( $campo[ 'tipo' ] == 'varchar' || $campo[ 'tipo' ] == 'text' || $campo[ 'tipo' ] == 'char' || $campo[ 'tipo' ] == 'mediumtext' || $campo[ 'tipo' ] == 'longtext' ) {
                            $camposQuery = ( $camposQuery == '' ) ? $key . '= ""' : $camposQuery . ', ' . $key . '= ""';
                        } else {
                            $camposQuery = ( $camposQuery == '' ) ? $key . '= 0' : $camposQuery . ', ' . $key . '= 0';
                        }
                    }
                }
            }
        }
        $strQuery .= $camposQuery . ' where ' . $campoId . '=' . $id;
        $res = $this->Consulta( $strQuery );
        if ( $res ) { return true; }
        return false;
    }
    public function borraDatos( $tabla, $id ) {
        $campoId = $this->getCampoId( $tabla );
        $res = $this->Consulta( 'delete from ' . $tabla . ' where ' . $campoId . ' = ' . $id );
        if ( $res ) { return true; }
        return false;
    }
    public function getCamposAll( $tabla ) {
        $campos = array();
        $resCampos = $this->Consulta( 'select COLUMN_COMMENT as comentarios, if ( COLUMN_KEY = "PRI", "S", "N" ) as esLlave, DATA_TYPE as tipoDatos, COLUMN_NAME as columna, if( IS_NULLABLE="NO", "S", "N" ) as obligatoria, COLUMN_DEFAULT as valorDefault, CHARACTER_MAXIMUM_LENGTH as tamano from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA="' . $this->database . '" and TABLE_NAME="' . $tabla . '" order by ORDINAL_POSITION asc' );
        while( $C = $this->Resultados( $resCampos ) ) {
            $campos[ $C[ 'columna' ] ] = array(
                'esLlave' => $C[ 'esLlave' ],
                'tipo' => $C[ 'tipoDatos' ],
                'required' => $C[ 'obligatoria' ],
                'default' => $C[ 'valorDefault' ],
                'size' => $C[ 'tamano' ],
                'comentario' => $C[ 'comentarios' ]
            );
        }
        return $campos;
    }
}
