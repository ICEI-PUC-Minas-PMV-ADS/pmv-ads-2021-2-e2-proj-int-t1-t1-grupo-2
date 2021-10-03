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

| **Caso de Teste** | **CT-02 – Formulários de cadastro** |
| --- | --- |
| **Requisitos Associados** | RF-002, RF-003, RF-004, RF-010  |
| **Objetivo do Teste** | Validar o funcionamento dos formulários de cadastro bam como o codigo da camada controller funcionam corretamente. |
| **Passos** | 1) Acessar o formulario de cadastro de restaurantes e clientes; 2) Realizar cadastros de teste; 3) Fazer atualizaçõess no formulario de cardapio; 5) Fazer atualizações nas informações das mesas disponiveis. |
| **Critérios de Êxito** | Informações cadastradas persistem e são recuperadas com exito durante a operação do site. |

| **Caso de Teste** | **CT-03 – Formulários de reserva** |
| --- | --- |
| **Requisitos Associados** | RF-005, RF-007, RF-009, RF-012, RF-014  |
| **Objetivo do Teste** | Validar o funcionamento dos formulários de reserva bam como o codigo da camada controller funcionam corretamente. |
| **Passos** | 1) Acessar o formulario de reserva; 2) Fazer algumas reservas de teste; 3) Consultar a reserva realizada; 4) Realizar cancelamento de reserva e cadastros de restaurantes/usuarios. |
| **Critérios de Êxito** | Informações cadastradas persistem e são recuperadas com exito durante a operação do site. |

| **Caso de Teste** | **CT-04 – Persistencia dos dados** |
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
