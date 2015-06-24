<?php

class Am_model extends Model {
    /* ======================================================
      Uso Geral
      ====================================================== */

    //Retorna todos os registros de qualquer tabela
    public function getAll($tabela, $campos = '*') {
        $resultado = parent::DBgetAll($tabela, $campos);
        return $resultado;
    }

    /* ======================================================
      Favoritos
      ====================================================== */
    /* Select na tabela categoria */

    public function listaSitesFavoritos($bindValues) {
        $conn = parent::conn();
        $dados = parent::DBread($conn, 'site_favorito', '*', 'where id = :id');
        $resultado = parent::DBexecuta($dados, $bindValues);
        return $resultado;
    }
    
    /*Adiciona Categoria*/
    public function addCategoria($dados) {
        if (is_array($dados)):
            $conn = $this->conn();
            $addCategoria = $this->DBcreate($conn, 'site_favorito_categoria', $dados);
            if ($addCategoria):
                return $addCategoria;
            endif;
        endif;
    }
    
    
    /*Adiciona Site aos Favoritos*/
    public function addSiteFavorito($dados) {
        if (is_array($dados)):
            $conn = $this->conn();
            $addCategoria = $this->DBcreate($conn, 'site_favorito', $dados);
            if ($addCategoria):
                return $addCategoria;
            endif;
        endif;
    }
    
    /*Deleta Sites*/
    public function delSite($arrDados) {
        $conn = $this->getConn();
        $delSites = $this->DBdelete($conn,'site_favorito', 'where id = :id', $arrDados);
        if( $delSites ):
            return true;
        endif;
    }
    
    

}
