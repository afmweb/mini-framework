<?php
class CrudDb extends Conn_Db {
//Efetua conexao com o Banco de Dados
    public function conn() {
      return  parent::getConn();
    }

    /* *** Método para incluir(CREAD) dados em tabelas do BD */
    public function DBcreate($conn, $tabela, array $dados ) {
        $campos = implode(',', array_keys($dados));
        $valores = ":" . implode(",:", array_keys($dados));
        $qry = "INSERT INTO $tabela ( {$campos} ) VALUES( {$valores} );";

        $stmt = $conn->prepare($qry);
        $stmt->execute($dados);
        return $conn->lastInsertId();
    }
    
    
    
    /* *** Método para ler(READ) dados nas tabelas do BD */
    function DBread($conn, $tabela, $campos = null, $where = null ) {
        $campos = (!empty($campos) ? $campos : $campos = '*' );
        if( !empty($where) ):
            $qry = "SELECT $campos FROM $tabela $where; ";
            $stmt = $conn->prepare($qry);
        else:
            $qry = "SELECT $campos FROM $tabela;";
            $stmt = $conn->prepare($qry);
        endif; 

        //$stmt->execute($bindValues);
        return $stmt;
    }    
        
    /* *** Método para atualizar(UPDATE) dados do Banco de dados */
    public function DBupdate($conn, $tabela, $arrCampos, $where, $arrId = null ) {    
        foreach($arrCampos as $k => $v):
            $campos[] = $k . ' = :' . $k;
        endforeach;
        $campos =implode(', ' ,$campos);   
        $qry = "UPDATE {$tabela} set {$campos} $where;";
        $stmt = $conn->prepare($qry);
        $stmt->execute(array_merge($arrCampos, $arrId));
        $count = $stmt->rowCount();
        //retorno o numero de linhas afetadas
        return $count;
    }
    
    /* *** Método para excluir(DELETE) dados do Banco de dados */
    function DBdelete($conn, $tabela, $where, $arrId ) {   
        $qry = "DELETE FROM {$tabela} {$where}";
        $stmt = $conn->prepare($qry);
       $stmt->execute($arrId);
        $numLinhas = $stmt->rowCount();
        //retorna o numero de linhas deletada.
        return $numLinhas;    
    }     
    
    
    /* *** Método para executar e retornar dados em arra */
    function  DBexecuta($stmt,$bindValues){    
       $stmt->execute($bindValues);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}//Class CRUD
