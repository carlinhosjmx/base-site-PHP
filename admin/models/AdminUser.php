<?php

/**
 * AdminUser.class [ MODEL ADMIN ]
 * Respnsável por gerenciar os usuários no Admin do sistema!
 */

class AdminUser {

    private $Data;
    private $User;
    private $Error;
    private $Result;

    //Nome da tabela no banco de dados
    const Entity = 'jm_users';

    /**
     * <b>Cadastrar Usuário:</b> Envelope os dados de um usuário em um array atribuitivo e execute esse método
     * para cadastrar o mesmo no sistema. Validações serão feitas!
     * @param ARRAY $Data = Atribuitivo
     */
    public function insertDb(array $Data) {
        $this->Data = $Data;
        $this->checkData();

        if ($this->Result):
            $this->cadastraUser();
        endif;
    }

    /**
     * <b>Atualizar Usuário:</b> Envelope os dados em uma array atribuitivo e informe o id de um
     * usuário para atualiza-lo no sistema!
     * @param INT $UserId = Id do usuário
     * @param ARRAY $Data = Atribuitivo
     */
    public function updateDb($UserId, array $Data) {
      
        $this->User = (int) $UserId;
        $this->Data = $Data;

        if (!$this->Data['user_password']):
            unset($this->Data['user_password']);
        endif;

        $this->checkData();

        if ($this->Result):
            $this->Update();
        endif;
    }

    /**
     * <b>Remover Usuário:</b> Informe o ID do usuário que deseja remover. Este método não permite deletar
     * o próprio perfil ou ainda remover todos os ADMIN'S do sistema!
     * @param INT $UserId = Id do usuário
     */
    public function userDelete($UserId) {
        $this->User = (int) $UserId;

        $readUser = new Read;
        $readUser->readDb(self::Entity, "WHERE user_id = :id", "id={$this->User}");

        if (!$readUser->getResult()):
            $this->Error = ['Oppsss, você tentou remover um usuário que não existe no sistema!', JMX_ERROR];
            $this->Result = false;
        elseif ($this->User == $_SESSION['userlogin']['user_id']):
            $this->Error = ['Oppsss, você tentou remover seu usuário. Essa ação não é permitida!!!', JMX_INFO];
            $this->Result = false;
        else:
            if ($readUser->getResult()[0]['user_level'] == 3):

                $readAdmin = $readUser;
                $readAdmin->readDb(self::Entity, "WHERE user_id != :id AND user_level = :lv", "id={$this->User}&lv=3");

                if (!$readAdmin->getRowCount()):
                    $this->Error = ['Oppsss, você está tentando remover o único ADMIN do sistema. Para remover cadastre outro antes!!!', JMX_ERROR];
                    $this->Result = false;
                else:
                    $this->Delete();
                endif;

            else:
                $this->Delete();
            endif;

        endif;
    }

    /**
     * <b>Verificar Cadastro:</b> Retorna TRUE se o cadastro ou update for efetuado ou FALSE se não.
     * Para verificar erros execute um getError();
     * @return BOOL $Var = True or False
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com um erro e um tipo.
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

    //Verifica os dados digitados no formulário
    private function checkData() {
        if (in_array('', $this->Data)):
            $this->Error = ["Existem campos em branco. Favor preencha todos os campos!", JMX_ALERT];
            $this->Result = false;
        elseif (!Check::Email($this->Data['user_email'])):
            $this->Error = ["O e-email informado não parece ter um formato válido!", JMX_ALERT];
            $this->Result = false;
        elseif (isset($this->Data['user_password']) && (strlen($this->Data['user_password']) < 6 || strlen($this->Data['user_password']) > 12)):
            $this->Error = ["A senha deve ter entre 6 e 12 caracteres!", JMX_INFO];
            $this->Result = false;
        else:
            $this->checkEmail();
        endif;
    }

    //Verifica usuário pelo e-mail, Impede cadastro duplicado!
    private function checkEmail() {
        $Where = ( isset($this->User) ? "user_id != {$this->User} AND" : '');

        $readUser = new Read;
        $readUser->readDb(self::Entity, "WHERE {$Where} user_email = :email", "email={$this->Data['user_email']}");

        if ($readUser->getRowCount()):
            $this->Error = ["O e-email informado foi cadastrado no sistema por outro usuário! Informe outro e-mail!", JMX_ERROR];
            $this->Result = false;
        else:
            $this->Result = true;
        endif;
    }

    //Cadasrtra Usuário!
    private function cadastraUser() {
        $Cadastra = new Insert;
        $this->Data['user_registration'] = date('Y-m-d H:i:s');
        $this->Data['user_password'] = md5($this->Data['user_password']);

        $Cadastra->insertDb(self::Entity, $this->Data);

        if ($Cadastra->getResult()):
            $this->Error = ["O usuário <b>{$this->Data['user_name']}</b> foi cadastrado com sucesso no sistema!", JMX_ACCEPT];
            $this->Result = $Cadastra->getResult();
        endif;
    }

    //Atualiza Usuário!
    private function Update() {
        $Update = new Update;
        if (isset($this->Data['user_password'])):
            $this->Data['user_password'] = md5($this->Data['user_password']);
        endif;

        $Update->updateDb(self::Entity, $this->Data, "WHERE user_id = :id", "id={$this->User}");
        if ($Update->getResult()):
            $this->Error = ["O usuário <b>{$this->Data['user_name']}</b> foi atualizado com sucesso!", JMX_ACCEPT];
            $this->Result = true;
        endif;
    }

    //Remove Usuário
    private function Delete() {
        $Delete = new Delete;
        $Delete->ExeDelete(self::Entity, "WHERE user_id = :id", "id={$this->User}");
        if ($Delete->getResult()):
            $this->Error = ["Usuário removido com sucesso do sistema!", JMX_ACCEPT];
            $this->Result = true;
        endif;
    }

}
