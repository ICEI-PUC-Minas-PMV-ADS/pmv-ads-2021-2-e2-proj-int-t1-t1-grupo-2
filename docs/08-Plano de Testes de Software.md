# Plano de Testes de Software

<span style="color:red">Pré-requisitos: <a href="2-Especificação do Projeto.md"> Especificação do Projeto</a></span>, <a href="3-Projeto de Interface.md"> Projeto de Interface</a>

Os requisitos para realização dos testes de software são:

- Site publicado na Internet
- Navegador da Internet - Chrome, Firefox ou Edge
- Conectividade de Internet para acesso às plataformas (APIs)

Os testes funcionais a serem realizados no site são descritos a seguir.

| **Caso de Teste** | **CT-01 – Navegabilidade e Visualização** |
| --- | --- |
| **Requisitos Associados** | RF-001, RF-005, RF-011, RF-012, RF-013 |
| **Objetivo do Teste** | Validar o carregamento do site (index.html) bem como suas funcionalidades de visualização e formularios ocorrem da forma esperada.|
| **Passos** | 1) Acessar o Navegador e informar o endereço do Site 2) Acessar os links vinculados aos restaurantes 3) Acessar os formularios para agendamento de reserva, elogios/reclamações, informações de contato e cardapio. |
| **Critérios de Êxito** | Validar se todos os campos dos formularios, imagens e textos hmtl carregam corretamente. |

| **Caso de Teste** | **CT-02 – Login e Cadastro** |
| --- | --- |
| **Requisitos Associados** | RF-002, RF-003, RF-009, RF-010  |
| **Objetivo do Teste** | Validar o funcionamento das camadas de negocio e persistencia de dados, onde os cadastros são realizados, bem como as funcionalidades relacionadas aos itens cadastrados. |
| **Passos** | 1) Acessar o formulario de cadastro de restaurantes e clientes; 2) Fazer alguns cadastros de teste; 3) Fazer uma reserva com um usuario cadastrado; 4) Fazer atualizaçõess no formulario de cardapio; 5) Realizar cancelamento de reserva e cadastros de restaurantes/usuarios. |
| **Critérios de Êxito** | Dados submetidos devem ser salvos em um array gerado por código Java Script em Local Storage e apresentados na página Serviços como tabela |
