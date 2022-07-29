# CRUD_Contatos
CRUD com 2 tabelas relacionadas feito com Doctrine e Symfony

Olá, seja bem vindo ao meu projeto.
Nesse Readme será explicado o passo a passo para rodar o projeto em sua máquina,
serei breve!
________________________________________________________________________________________________________________________________

>Primeira coisa há ser feita é editar o arquivo .env na linha 30 conforme seu computador
* A versão do PHP é importante, já que apartir da versão 8 a documentação doctrine fica diferente, utilizei a versão 7.28
________________________________________________________________________________________________________________________________
rode no seu terminal:

  * $ composer upgrade
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
  > Não feche o terminal durante o acesso do projeto no navegador.<br />
  
* A baixo são alguns dados que você pode rodar no seu bd:

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
