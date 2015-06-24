<?php
require_once 'conn_db.php';
class ModelMain extends Conn_Db {   
   public $Model;
   
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
            return $stmt;
        else:
            $qry = "SELECT $campos FROM $tabela;";
            $stmt = $conn->prepare($qry);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        endif; 
    }    
        
    /* *** Método para ler(READ) Todos os dados de uma tabela */
    function DBgetAll($tabela, $campos = '*') {
        if( empty($tabela) ):
            die('<h2>Informe o nome da tabela</h2>');
        else:
            $qry = "SELECT $campos FROM $tabela;";
            $stmt = $this->conn()->prepare($qry);
            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        endif; 
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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function setModel($metodo) {
        $this->Model =new $metodo();
    }    

}//Class CRUD
