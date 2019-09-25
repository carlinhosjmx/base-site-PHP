<?php

/**
 * AdminCategory.class [ MODEL ADMIN ]
 * Responável por gerenciar as categorias do sistema no admin!
  */

class AdminSubCategory {

    private $Data;
    private $CatId;
    private $Error;
    private $Result;

    //Nome da tabela no banco de dados!
    const Entity = 'jm_sub_category';

    /**
     * <b>Cadastrar Categoria:</b> Envelope titulo, descrição, data e sessão em um array atribuitivo e execute esse método
     * para cadastrar a categoria. Case seja uma sessão, envie o categorie_id como STRING null.
     * @param ARRAY $Data = Atribuitivo
     */
    public function cadastraCat(array $Data) {
       
        $this->Data = $Data;


       

        if (in_array('', $this->Data)):

            $this->Result = false;
            $this->Error = ["<div class='error-alert'><b>Erro ao cadastrar:</b> Para cadastrar uma Subcategoria, preencha todos os campos! </div>", JMX_ALERT];

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
            $this->Error = ["<div class='error-alert'><b>Erro ao atualizar:</b> Para atualizar a Subcategoria {$this->Data['sub_category_name']}, preencha todos os campos!</div>", JMX_ALERT];
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
        $read->readDb(self::Entity, "WHERE id_sub_category = :delid", "delid={$this->CatId}");

        if (!$read->getResult()):

            $this->Result = false;
            $this->Error = ['<div class="error-alert">Você tentou remover uma subcategoria que não existe no sistema!</div>', JMX_INFO];

        else:
            extract($read->getResult()[0]);

            if (! $id_sub_category && !$this->checkCats()):

                $this->Result = false;
                $this->Error = ["<div class='error-alert'>A <b>seção {$sub_category_name}</b> possui categorias cadastradas. Para deletar, antes altere ou remova as categorias filhas!</div>", JMX_ALERT];

            elseif ($id_sub_category && !$this->checkPosts()):

                $this->Result = false;
                $this->Error = ["<div class='error-alert'>A <b>Subcategoria {$sub_category_name}</b> possui artigos cadastrados. Para deletar, antes altere ou remova todos os posts desta categoria!</div>", JMX_ALERT];

            else:

                $delete = new Delete;
                $delete->ExeDelete(self::Entity, "WHERE id_sub_category = :deletaid", "deletaid={$this->CatId}");

                $tipo = ( empty($categorie_id) ? 'seção' : 'categoria' );
                $this->Result = true;
                $this->Error = ["<div class='error-alert'>A <b>{$tipo} {$sub_category_name}</b> foi removida com sucesso do sistema!</div>",JMX_ACCEPT];

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
        $this->Data['sub_category_name'] = Check::urlFormat($this->Data['sub_category_tags']);
        $this->Data['sub_category_date'] = Check::formatData($this->Data['sub_category_date']);
        
        
    }

    //Verifica o NAME da categoria. Se existir adiciona um pós-fix +1
    private function setName() {

        $Where = (!empty($this->CatId) ? "id_sub_category != {$this->CatId} AND" : '' );

   

        $readName = new Read;
        $readName->readDb(self::Entity, "WHERE {$Where} sub_category_tags = :t", "t={$this->Data['sub_category_tags']}");

        if ($readName->getResult()):
            $this->Data['sub_category_name'] = $this->Data['sub_category_name'] . '-' . $readName->getRowCount();
        endif;

    }

    //Verifica categorias da seção
    private function checkCats() {

        $readSes = new Read;
        $readSes->readDb(self::Entity, "WHERE id_sub_category = :parent", "parent={$this->CatId}");

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
            $this->Error = ["<div class='sucess'><b>Sucesso:</b> A Subcategoria {$this->Data['sub_category_name']} foi cadastrada no sistema!</div>", JMX_ACCEPT];


        endif;
    }

    //Atualiza Categoria
    private function Update() {

        $Update = new Update;
        $Update->updateDb(self::Entity, $this->Data, "WHERE id_sub_category = :catid", "catid={$this->CatId}");
        if ($Update->getResult()):
            $tipo = ( empty($this->Data['id_sub_category']) ? 'seção' : 'categoria' );
            $this->Result = true;
            $this->Error = ["<div class='sucess'><b>Sucesso:</b> A {$tipo} {$this->Data['sub_category_name']} foi atualizada no sistema!</div>", JMX_ACCEPT];
        endif;
    }

}
