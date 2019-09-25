<?php


   <div class="btn-group bt-index-painel">
       <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" onclick="window.location.href={ $includepatch = __DIR__ . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR . 'home.php'; } " aria-haspopup="true" aria-expanded="false">
         inicio<span class="caret"></span>
       </button>
	   
      
	</div>
		
   <div class="btn-group bt-index-painel">
       <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Postar Conteúdo<span class="caret"></span>
       </button>
       <ul class="dropdown-menu">
         <li><a href="painel.php?exe=posts/create">Postar novo</a></li>
         <li><a href="painel.php?exe=posts/index">Editar postagem</a></li>
   
        </ul>
   </div>
     <div class="btn-group">
       <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Criar Categoria<span class="caret"></span>
       </button>
       <ul class="dropdown-menu">
         <li><a href="painel.php?exe=categories/create">Criar nova categoria</a></li>
         <li><a href="painel.php?exe=categories/index">Editar uma Categoria</a></li>
   
        </ul>
   </div>
   
     <div class="btn-group">
       <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ver o site<span class="caret"></span>
       </button>
       <ul class="dropdown-menu">
         <li><a href="<?= BASE ?>/admin/system/posts/create.php">Visualizar o Site</a></li>
      
   
        </ul>
   </div>




?>