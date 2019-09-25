<div class="container">
    <div class="area-user">

<?php     
 
    if(isset($_SESSION[ 'loginUser' ])){   ?>
       
    <section class="menu-left">
        <div class="box-user">
            <div class="foto-user">
                <h1>Bem vindo a sua área</h1>
                <img src="<?php echo $user[0]['foto']; ?>"/>
            </div>
            <div class="itens">
            <div class="user-itens"><?php echo $user[0]['nome']; ?></div>
            <div class="user-itens"> <?php echo $user[0]['instrumento']; ?></div>
            <div class="user-itens"><?php echo $user[0]['bairro']; ?></div>
            <div class="user-itens"><?php echo $user[0]['cidade']; ?></div>
            </div>
        </div>
    </section>

    <section>
        <div class="area">

             <h1 class="search">Buscar Partitura</h1>

    <div class="box_form_busca">


     <form class="form_busca" name="form1" method="post" action="">
     
       <label> 
           <select id="seletor" name="seletor">
               <option value="0">Buscar por</option>
               <option value="1">Nome da Música</option>
               <option value="2">Artista</option>
               <option value="3">Instrumento</option>
               <option value="4">usuário</option>
               <option value="5">Tipo de Arquivo</option>
           </select>
       </label>
 
       <label><input type="text" name="pesquisar"  title="Digite o que procura" placeholder="Digite a palavra ou apenas a primeira letra"  /></label>
       <label><input type="hidden" name="search" value="pesquisar" />
       <input type="submit" class="bt-busca" name="button" id="button" value="Pesquisar" /></label>

  
      </form>

    </div>


        </div>
    </section>
    <section class="menu-right">
    <div class="ads"></div>
    </section>

       
        
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   <?php }else{

         echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
               alert ("location.href = "http://localhost/EstruturaSite";
               </SCRIPT>';
}


?>
</div>
</div>


  