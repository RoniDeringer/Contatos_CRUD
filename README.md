# CRUD_Contatos
CRUD com 2 tabelas relacionadas feito com Composer, Doctrine e Symfony

Olá, seja bem vindo ao meu projeto.
Nesse Readme será explicado o passo a passo para rodar o projeto em sua máquina,
serei breve!
________________________________________________________________________________________________________________________________

Baixe o arquivo .zip em seu computador, ou clone direto pelo github. 
    Para isso use </br>$ git clone https://github.com/RoniDeringer/CRUD_Contatos.git
    
abra a pasta em seu editor 

>Primeira coisa há ser feita é editar o arquivo .env na linha 30 conforme seu computador

* Não se esqueça de startar seu apache e seu mysql (no meu caso usei o xampp para ambos)
* Se você não tiver o composer será necessário baixar
* A versão do PHP também é importante, já que apartir da versão 8 as annotations ficam diferentes, utilizei a versão 7.28
________________________________________________________________________________________________________________________________
rode no seu terminal:

  * $ composer install
  * $ composer require symfony/runtime
  * $ php bin/console doctrine:database:create
      >Obs: Se der algum erro na criação do banco de dados, volte a linha 30 do arquivo .env
  * $ php bin/console make:migration  
      >Yes
  * $ php bin/console doctrine:migrations:migrate
      >Yes <br/>
      >Obs: normal dar alguns erros nessa parte <br />   
      
      
  Startando o symfony em sua máquina:
  * $ php -S localhost:8080 -t public/<br /> 
  ou:<br /> 
  * $ symfony start:server<br />
    
  > Observe o retono do terminal, lá vai estar o link para acessar o projeto.<br />
  > Para acessar o projeto, cole o link que o terminal retornou e adicione /contato na url<br />
  > Não feche o terminal durante o acesso do projeto no navegador.<br />
  
* Para inserir dados nas tabelas, pode ser feito pelo próprio CRUD ou rode as linhas abaixo:

    insert into pessoa(
      nome,cpf)VALUES
      ("Roni Deringer ","111.111.111-01"),
      ("Renato Aragão ","222.222.222-02"),
      ("João Peixoto  ","333.333.333-33");


    insert into contato(
      tipo, descricao, id_pessoa_id)VALUES
      ("0", "Pessoa Fisica   ","1"),
      ("1", "Pessoa com CNPJ ","2"),
      ("0", "Pessoa com MEI  ","3"),
      ("1", "Pessoa Fisica   ","3");
________________________________________________________________________________________________________________________________

Esse projeto foi feito com muita dedicação e estudos, espero que gostem, e toda critíca construtiva será sempre bem vinda!
