##Sistema de Cadastro de Associados##

Este projeto é um sistema desenvolvido em PHP para o cadastro e gerenciamento de associados. Utiliza o Apache como servidor web, MySQL como banco de dados e o MySQL Workbench para gerenciamento e visualização do banco.

##Tecnologias Utilizadas##
- PHP: Linguagem de programação utilizada para o desenvolvimento do sistema.
- Apache: Servidor web utilizado para servir as páginas PHP.
- MySQL: Banco de dados utilizado para armazenar as informações dos associados e das anuidades.
- MySQL Workbench: Ferramenta utilizada para gerenciar e administrar o banco de dados MySQL.

##Instalação##
##Requisitos##
- Apache: Certifique-se de que o Apache está instalado e em execução.
- MySQL: O banco de dados MySQL precisa estar instalado.
- PHP: O PHP deve estar instalado e configurado corretamente com o Apache.

1. Clone o Repositório Clone o repositório para sua máquina local:

2. Configuração do Apache: Coloque os arquivos do projeto na pasta de documentos do Apache, por exemplo, htdocs se estiver utilizando o XAMPP.
   
3. Configuração do Banco de Dados: Rode o ScripDb no mySql workbench para criar o banco de dados. script disponivel no repositorio.
4. Configuração do Arquivo de Conexão: Modifique connectionDb.
$servername = ""; 
$database = "";
$username = '';
$password = '';

5.Acesse o Sistema Após a configuração, abra o navegador e acesse:
