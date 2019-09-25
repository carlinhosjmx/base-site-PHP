<?php

namespace app\Conn;

use app\Conn\Conn;
use \PDO;

/**
 * <b>Insert.class:</b>
 * Classe responsável por cadastros genéticos no banco de dados!
 */


class Insert extends Conn {

    private $Tabela;
    private $Dados;
    private $Result;

    /** @var PDOStatement */
    private $Insert;

    /** @var PDO */
    private $Conn;

    /**
     * <b>ExeInsert:</b> Executa um cadastro simplificado no banco de dados utilizando prepared statements.
     * Basta informar o nome da tabela e um array atribuitivo com nome da coluna e valor!
     * 
     * @param STRING $Tabela = Informe o nome da tabela no banco!
     * @param ARRAY $Dados = array atribuitivo( Nome Da Coluna => Valor ) formato de entrada de dados na tabela.
     */
    public function insertDb($Tabela, array $Dados) {
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados;

        $this->getQuery();
        $this->Execute();
    }

    /**
     * <b>Obter resultado:</b> Retorna o ID do registro inserido ou FALSE caso nem um registro seja inserido! 
     * @return INT $Variavel = lastInsertId OR FALSE
     */
    public function getResult() {
        return $this->Result;
    }


    //Cria a sintaxe da query para Prepared Statements
    private function getQuery() {
        $Fields = implode(', ', array_keys($this->Dados));
        $PdoValue = ':' . implode(', :', array_keys($this->Dados));
        $this->Insert = "INSERT INTO {$this->Tabela} ({$Fields}) VALUES ({$PdoValue})";
    }

    //Obtém a Conexão e a Syntax, executa a query!
    private function Execute() {
        
        $this->Conn = parent::getConn();
        $this->Insert = $this->Conn->prepare($this->Insert);
        
        try {

            $this->Insert->execute($this->Dados);
            $this->Result = $this->Conn->lastInsertId();

        } catch (PDOException $e) {
            
            $this->Result = null;
            ErroJMX("<b>Erro ao cadastrar:</b> {$e->getMessage()}", $e->getCode());
        }
    }

}
