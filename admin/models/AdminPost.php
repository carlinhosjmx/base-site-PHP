<?php

namespace admin\models;

use app\Conn\Read;
use app\Conn\Delete;
use app\Conn\Update;
use app\Conn\Insert;
use app\Helpers\Check;
use app\Helpers\Upload;

/**
 * AdminPost.class [ MODEL ADMIN ]
 * Respnsável por gerenciar os posts no Admin do sistema!
 */

class AdminPost {

    private $Data;
    private $Post;
    private $Error;
    private $Result;

    //Nome da tabela no banco de dados
    const Entity = 'jm_posts';

    /**
     * <b>Cadastrar o Post:</b> Envelope os dados do post em um array atribuitivo e execute esse método
     * para cadastrar o post. Envia a capa automaticamente!
     * @param ARRAY $Data = Atribuitivo
     */
    public function cadastraPost(array $Data) {
        
        $this->Data = $Data;

      


        if (sizeof($this->Data) == 0):
            $this->Error = ["Erro ao cadastrar: Para criar uma postagem, Você precisa preencher alguns campos!", JMX_ALERT];
            $this->Result = false;
        else:
            $this->setData();
            $this->setName();

            if ($this->Data['post_cover']):
                $uplaod = new Upload;
                $uplaod->Image($this->Data['post_cover'], $this->Data['post_name']);
            endif;

            if (isset($uplaod) && $uplaod->getResult()):
                $this->Data['post_cover'] = $uplaod->getResult();
                $this->exeCadastra();
            else:
                $this->Data['post_cover'] = null;
                $this->exeCadastra();
            endif;
        endif;
    }

    /**
     * <b>Atualizar Post:</b> Envelope os dados em uma array atribuitivo e informe o id de um 
     * post para atualiza-lo na tabela!
     * @param INT $PostId = Id do post
     * @param ARRAY $Data = Atribuitivo
     */
    public function updateDb($PostId, array $Data) {
        $this->Post = (int) $PostId;
        $this->Data = $Data;

        if (sizeof($this->Data) == 0):
            $this->Error = ["Para atualizar esta postagem, preencha todos os campos ( Capa não precisa ser enviada! )", JMX_ALERT];
            $this->Result = false;
        else:
            $this->setData();
            $this->setName();

            if (is_array($this->Data['post_cover'])):
                $readCapa = new Read;
                $readCapa->readDb(self::Entity, "WHERE post_id = :post", "post={$this->Post}");
                $capa = '../uploads/' . $readCapa->getResult()[0]['post_cover'];
                if (file_exists($capa) && !is_dir($capa)):
                    unlink($capa);
                endif;

                $uploadCapa = new Upload;
                $uploadCapa->Image($this->Data['post_cover'], $this->Data['post_name']);
            endif;

            if (isset($uploadCapa) && $uploadCapa->getResult()):
                $this->Data['post_cover'] = $uploadCapa->getResult();
                $this->Update();
            else:
                unset($this->Data['post_cover']);
                $this->Update();
            endif;
        endif;
    }

    /**
     * <b>Deleta Post:</b> Informe o ID do post a ser removido para que esse método realize uma checagem de
     * pastas e galerias excluinto todos os dados nessesários!
     * @param INT $PostId = Id do post
     */
    public function ExeDelete($PostId) {
        $this->Post = (int) $PostId;

        $ReadPost = new Read;
        $ReadPost->readDb(self::Entity, "WHERE post_id = :post", "post={$this->Post}");

        if (!$ReadPost->getResult()):
            $this->Error = ["A postagem que você tentou deletar não existe no sistema!", JMX_ERROR];
            $this->Result = false;
        else:
            $PostDelete = $ReadPost->getResult()[0];
            if (file_exists('../uploads/' . $PostDelete['post_cover']) && !is_dir('../uploads/' . $PostDelete['post_cover'])):
                unlink('../uploads/' . $PostDelete['post_cover']);
            endif;

            $readGallery = new Read;
            $readGallery->readDb("jm_posts_gallery", "WHERE post_id = :id", "id={$this->Post}");
            if ($readGallery->getResult()):
                foreach ($readGallery->getResult() as $gbdel):
                    if (file_exists('../uploads/' . $gbdel['gallery_image']) && !is_dir('../uploads/' . $gbdel['gallery_image'])):
                        unlink('../uploads/' . $gbdel['gallery_image']);
                    endif;
                endforeach;
            endif;

            $deleta = new Delete;
            $deleta->ExeDelete("jm_posts_gallery", "WHERE post_id = :gbpost", "gbpost={$this->Post}");
            $deleta->ExeDelete(self::Entity, "WHERE post_id = :postid", "postid={$this->Post}");

            $this->Error = ["A postagem <b>{$PostDelete['post_title']}</b> foi removida com sucesso do sistema!", JMX_ACCEPT];
            $this->Result = true;

        endif;
    }

    /**
     * <b>Ativa/Inativa Post:</b> Informe o ID do post e o status e um status sendo 1 para ativo e 0 para
     * rascunho. Esse méto ativa e inativa os posts!
     * @param INT $PostId = Id do post
     * @param STRING $PostStatus = 1 para ativo, 0 para inativo
     */
    public function ExeStatus($PostId, $PostStatus) {
        $this->Post = (int) $PostId;
        $this->Data['post_status'] = (string) $PostStatus;
        $Update = new Update;
        $Update->updateDb(self::Entity, $this->Data, "WHERE post_id = :id", "id={$this->Post}");
    }

    /**
     * <b>Enviar Galeria:</b> Envelope um $_FILES de um input multiple e envie junto a um postID para executar
     * o upload e o cadastro de galerias do artigo!
     * @param ARRAY $Files = Envie um $_FILES multiple
     * @param INT $PostId = Informe o ID do post
     */
    public function gbSend(array $Images, $PostId) {
        $this->Post = (int) $PostId;
        $this->Data = $Images;

        $ImageName = new Read;
        $ImageName->readDb(self::Entity, "WHERE post_id = :id", "id={$this->Post}");

        if (!$ImageName->getResult()):
            $this->Error = ["Erro ao enviar galeria. O índice {$this->Post} não foi encontrado no banco!", JMX_ERROR];
            $this->Result = false;
        else:
            $ImageName = $ImageName->getResult()[0]['post_name'];

            $gbFiles = array();
            $gbCount = count($this->Data['tmp_name']);
            $gbKeys = array_keys($this->Data);

            for ($gb = 0; $gb < $gbCount; $gb++):
                foreach ($gbKeys as $Keys):
                    $gbFiles[$gb][$Keys] = $this->Data[$Keys][$gb];
                endforeach;
            endfor;

            $gbSend = new Upload;
            $i = 0;
            $u = 0;

            foreach ($gbFiles as $gbUpload):
                $i++;
                $ImgName = "{$ImageName}-gb-{$this->Post}-" . (substr(md5(time() + $i), 0, 5));
                $gbSend->Image($gbUpload, $ImgName);

                if ($gbSend->getResult()):
                    $gbImage = $gbSend->getResult();
                    $gbCreate = ['post_id' => $this->Post, "gallery_image" => $gbImage, "gallery_date" => date('Y-m-d H:i:s')];
                    $insertGb = new Insert();
                    $insertGb->insertDb("jm_posts_gallery", $gbCreate);
                    $u++;
                endif;

            endforeach;

            if ($u > 1):
                $this->Error = ["Galeria Atualizada: Foram enviadas {$u} imagens para galeria desta postagem!", JMX_ACCEPT];
                $this->Result = true;
            endif;
        endif;
    }

    /**
     * <b>Deletar Imagem da galeria:</b> Informe apenas o id da imagem na galeria para que esse método leia e remova
     * a imagem da pasta e delete o registro do banco!
     * @param INT $GbImageId = Id da imagem da galleria
     */
    public function gbRemove($GbImageId) {
        $this->Post = (int) $GbImageId;
        $readGb = new Read;
        $readGb->readDb("jm_posts_gallery", "WHERE gallery_id = :gb", "gb={$this->Post}");
        if ($readGb->getResult()):

            $Imagem = '../uploads/' . $readGb->getResult()[0]['gallery_image'];

            if (file_exists($Imagem) && !is_dir($Imagem)):
                unlink($Imagem);
            endif;

            $Deleta = new Delete;
            $Deleta->ExeDelete("jm_posts_gallery", "WHERE gallery_id = :id", "id={$this->Post}");
            if ($Deleta->getResult()):
                $this->Error = ["A imagem foi removida com sucesso da galeria!", JMX_ACCEPT];
                $this->Result = true;
            endif;

        endif;
    }

    /**
     * <b>Verificar Cadastro:</b> Retorna ID do registro se o cadastro for efetuado ou FALSE se não.
     * Para verificar erros execute um getError();
     * @return BOOL $Var = InsertID or False
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com uma mensagem e o tipo de erro.
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
        $Cover = $this->Data['post_cover'];
        $Content = $this->Data['post_content'];
        unset($this->Data['post_cover'], $this->Data['post_content']);

        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);

        $this->Data['post_name'] = Check::urlFormat($this->Data['post_title']);
        $this->Data['post_date'] = Check::formatData($this->Data['post_date']);
	
        $this->Data['post_type'] = 'post';
        $this->Data['post_cover'] = $Cover;
        $this->Data['post_content'] = $Content;
        $this->Data['post_category'] = $this->Data['post_category'];


    }

    //Obtem o ID da categoria PAI
    private function getCatParent() {
        $rCat = new Read;
        $rCat->readDb("jm_categories", "WHERE category_id = :id", "id={$this->Data['post_category']}");
        if ($rCat->getResult()):
            return $rCat->getResult()[0]['category_parent'];
        else:
            return null;
        endif;
    }

    //Verifica o NAME post. Se existir adiciona um pós-fix -Count
    private function setName() {
        $Where = (isset($this->Post) ? "post_id != {$this->Post} AND" : '');
        $readName = new Read;
        $readName->readDb(self::Entity, "WHERE {$Where} post_title = :t", "t={$this->Data['post_title']}");
        if ($readName->getResult()):
            $this->Data['post_name'] = $this->Data['post_name'] . '-' . $readName->getRowCount();
        endif;
    }

    //Cadastra o post no banco!
    private function exeCadastra() {
        $cadastra = new Insert();
        $cadastra->insertDb(self::Entity, $this->Data);
        if ($cadastra->getResult()):
            $this->Error = ["A postagem <b>{$this->Data['post_title']}</b> foi cadastrada com sucesso!", JMX_ACCEPT];
            $this->Result = $cadastra->getResult();
        endif;
    }

    //Atualiza o post no banco!
    private function Update() {
        $Update = new Update;
        $Update->updateDb(self::Entity, $this->Data, "WHERE post_id = :id", "id={$this->Post}");
        if ($Update->getResult()):
            $this->Error = ["A postagem <b>{$this->Data['post_title']}</b> foi atualizada com sucesso !", JMX_ACCEPT];
            $this->Result = true;
        endif;
    }

}
