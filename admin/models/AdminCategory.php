<?php

namespace admin\models;

use app\Conn\Read;
use app\Conn\Insert;
use app\Conn\Delete;
use app\Conn\Update;
use app\Helpers\Check;



/**
 * AdminCategory.class [ MODEL ADMIN ]
 * Responável por gerenciar as categorias do sistema no admin!
  */

class AdminCategory {

    private $Data;
    private $CatId;
    private $Error;
    private $Result;

    //Nome da tabela no banco de dados!
    const Entity = 'jm_categories';

    /**
     * <b>Cadastrar Categoria:</b> Envelope titulo, descrição, data e sessão em um array atribuitivo e execute esse método
     * para cadastrar a categoria. Case seja uma sessão, envie o category_parent como STRING null.
     * @param ARRAY $Data = Atribuitivo
     */
    public function cadastraCat(array $Data) {
       
        $this->Data = $Data;

        if (in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ["<div class='error-alert'><b>Erro ao cadastrar:</b> Para cadastrar uma categoria, preencha todos os campos! </div>", JMX_ALERT];
        else:
            $this->setData();
            $this->setName();
            $this->cadastra();
        endif;
    }

    /**
     * <b>Atualizar Categoria:</b> Envelope os dados em uma array atribuitivo e informe o id de uma
     * categoria para atualiza-la!
     * @param INT $CategoryId = Id da categoria
     * @param ARRAY $Data = Atribuitivo
     */
    public function updateDb($CategoryId, array $Data) {
        $this->CatId = (int) $CategoryId;
        $this->Data = $Data;

        if (in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ["<div class='error-alert'><b>Erro ao atualizar:</b> Para atualizar a categoria {$this->Data['category_title']}, preencha todos os campos!</div>", JMX_ALERT];
        else:
            $this->setData();
            $this->setName();
            $this->Update();
        endif;
    }

    /**
     * <b>Deleta categoria:</b> Informe o ID de uma categoria para remove-la do sistema. Esse método verifica
     * o tipo de categoria e se é permitido excluir de acordo com os registros do sistema!
     * @param INT $CategoryId = Id da categoria
     */
    public function catDelete($CategoryId) {
        $this->CatId = (int) $CategoryId;

        $read = new Read;
        $read->readDb(self::Entity, "WHERE category_id = :delid", "delid={$this->CatId}");

        if (!$read->getResult()):
            $this->Result = false;
            $this->Error = ['<div class="error-alert">Você tentou remover uma categoria que não existe no sistema!</div>', JMX_INFO];
        else:
            extract($read->getResult()[0]);
            if (!$category_parent && !$this->checkCats()):
                $this->Result = false;
                $this->Error = ["<div class='error-alert'>A <b>seção {$category_title}</b> possui categorias cadastradas. Para deletar, antes altere ou remova as categorias filhas!</div>", JMX_ALERT];
            elseif ($category_parent && !$this->checkPosts()):
                $this->Result = false;
                $this->Error = ["<div class='error-alert'>A <b>categoria {$category_title}</b> possui artigos cadastrados. Para deletar, antes altere ou remova todos os posts desta categoria!</div>", JMX_ALERT];
            else:
                $delete = new Delete;
                $delete->ExeDelete(self::Entity, "WHERE category_id = :deletaid", "deletaid={$this->CatId}");

                $tipo = ( empty($category_name) ? 'seção' : 'categoria' );
                $this->Result = true;
                $this->Error = ["<div class='error-alert'>A <b>{$tipo} {$category_title}</b> foi removida com sucesso do sistema!</div>",JMX_ACCEPT];
            endif;
        endif;
    }

    /**
     * <b>Verificar Cadastro:</b> Retorna TRUE se o cadastro ou update for efetuado ou FALSE se não. Para verificar
     * erros execute um getError();
     * @return BOOL $Var = True or False
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com a mensagem e o tipo de erro!
     * @return ARRAY $Error = Array associatico com o erro
     */
    public function getError() {
        return $this->Error;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Valida e cria os dados para realizar o cadastro
    private function setData() {
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);
        $this->Data['category_menu'] =   $this->Data['category_menu'];
        $this->Data['category_type'] =   $this->Data['category_type'];
        $this->Data['category_parent'] =   $this->Data['category_parent'];
        $this->Data['category_name'] = Check::urlFormat($this->Data['category_title']);
        $this->Data['category_date'] = Check::formatData($this->Data['category_date']);
        
        
    }

    //Verifica o NAME da categoria. Se existir adiciona um pós-fix +1
    private function setName() {
        $Where = (!empty($this->CatId) ? "category_id != {$this->CatId} AND" : '' );

        $readName = new Read;
        $readName->readDb(self::Entity, "WHERE {$Where} category_title = :t", "t={$this->Data['category_title']}");
        if ($readName->getResult()):
            $this->Data['category_name'] = $this->Data['category_name'] . '-' . $readName->getRowCount();
        endif;
    }

    //Verifica categorias da seção
    private function checkCats() {
        $readSes = new Read;
        $readSes->readDb(self::Entity, "WHERE category_parent = :parent", "parent={$this->CatId}");
        if ($readSes->getResult()):
            return false;
        else:
            return true;
        endif;
    }

    //Verifica artigos da categoria
    private function checkPosts() {
        $readPosts = new Read;
        $readPosts->readDb("jm_posts", "WHERE post_category = :category", "category={$this->CatId}");
        if ($readPosts->getResult()):
            return false;
        else:
            return true;
        endif;
    }

    //Cadastra a categoria no banco!
    private function cadastra() {
        $Insert = new Insert();
         $Insert ->insertDb(self::Entity, $this->Data);
        if ( $Insert ->getResult()):
            $this->Result =  $Insert ->getResult();
            $this->Error = ["<div class='sucess'><b>Sucesso:</b> A categoria {$this->Data['category_title']} foi cadastrada no sistema!</div>", JMX_ACCEPT];
        endif;
    }

    //Atualiza Categoria
    private function Update() {
        $Update = new Update;
        $Update->updateDb(self::Entity, $this->Data, "WHERE category_id = :catid", "catid={$this->CatId}");
        if ($Update->getResult()):
            $tipo = ( empty($this->Data['category_name']) ? 'seção' : 'categoria' );
            $this->Result = true;
            $this->Error = ["<div class='sucess'><b>Sucesso:</b> A {$tipo} {$this->Data['category_title']} foi atualizada no sistema!</div>", JMX_ACCEPT];
        endif;
    }

}
