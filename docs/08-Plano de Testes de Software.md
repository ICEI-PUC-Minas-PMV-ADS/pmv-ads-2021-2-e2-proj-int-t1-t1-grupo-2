# Plano de Testes de Software

<span style="color:red">Pré-requisitos: <a href="2-Especificação do Projeto.md"> Especificação do Projeto</a></span>, <a href="3-Projeto de Interface.md"> Projeto de Interface</a>

Os requisitos para realização dos testes de software são:

- Site publicado na Internet
- Navegador da Internet - Chrome, Firefox ou Edge
- Conectividade de Internet para acesso às plataformas (APIs)

Os testes funcionais a serem realizados no site são descritos a seguir.

| **Caso de Teste** | **CT-01 – Navegação** |
| --- | --- |
| **Requisitos Associados** | RF-001, RF-013, RF-017 |
| **Objetivo do Teste** | Validar o carregamento do site (index.html) bem como suas funcionalidades de visualização e formularios ocorrem da forma esperada.|
| **Passos** | 1) Acessar o Navegador e informar o endereço do Site 2) Acessar os links vinculados aos restaurantes 3) Acessar os formularios para agendamento de reserva, elogios/reclamações, informações de contato e cardapio. |
| **Critérios de Êxito** | Validar se as paginas hmtl carregam corretamente. |

| **Caso de Teste** | **CT-02 – Cadastro** |
| --- | --- |
| **Requisitos Associados** | RF-002, RF-003, RF-004, RF-009, RF-010  |
| **Objetivo do Teste** | Validar o funcionamento do codigo relacionado aos cadastros de clientes. |
| **Passos** | 1) Acessar o formulario de cadastro de restaurantes e clientes; 2) Realizar cadastros de teste; 3) Fazer uma reserva de teste; 4) Fazer atualizaçõess no formulario de cardapio; 5) Realizar cancelamento de reserva e cadastros de restaurantes/usuarios. |
| **Critérios de Êxito** | Dados submetidos devem ser salvos em um array gerado por código Java Script em Local Storage e apresentados na página Serviços como tabela |

| **Caso de Teste** | **CT-03 – Funções do Controller** |
| --- | --- |
| **Requisitos Associados** | RF-005, RF-007, RF-012, RF-014  |
| **Objetivo do Teste** | Validar o funcionamento dos formulários relacionados ao codigo da camada controller funciona corretamente .|
| **Passos** | 1) Acessar o formulario de cadastro de restaurantes e clientes; 2) Fazer alguns cadastros de teste; 3) Fazer uma reserva com um usuario cadastrado; 4) Fazer atualizaçõess no formulario de cardapio; 5) Realizar cancelamento de reserva e cadastros de restaurantes/usuarios. |
| **Critérios de Êxito** | Dados submetidos nos formularios são operados corretamente pelas funções programadas no controller. |

| **Caso de Teste** | **CT-04 – Camada de persistencia de dados** |
| --- | --- |
| **Requisitos Associados** | RF-006, RF-008, RF-011 |
| **Objetivo do Teste** | Validar o funcionamento das camadas de persistencia de dados, onde as informações cadastradas no sistema que são consultadas retornam como resultado os dados que foram inseridos.  |
| **Passos** | 1) Acessar a area de cadastro ou de cliente ou de restaurante ; 2) Clicar na opções de relatorio de reservas. |
| **Critérios de Êxito** | As informações que são retornadas correspondem ao que está salvo nas tabelas do banco de dados relacionadas aos objetos da consulta. |

| **Caso de Teste** | **CT-05 – Função de Pesquisa** |
| --- | --- |
| **Requisitos Associados** | RF-015, RF-016 |
| **Objetivo do Teste** | Validar o funcionamento da função de pesquisa do sistema, filtragem de resultados conforme parametros informados. |
| **Passos** | 1) Acessar o campo de pesquisa; 2) Selecionar as opções desejadas; 3) Clicar em pesquisa; 4) Ordenar os resultados conforme preferencia. |
| **Critérios de Êxito** | Informações retonadas no resultado da pesquisa correspondem aos criterios selecionados. |
