# My Diary

## Resumo da Ideia

Este projeto é um diário digital onde usuários podem criar, editar, listar e excluir entradas pessoais. O foco é permitir que cada usuário tenha seu próprio espaço seguro, acessível apenas após login, para registrar e organizar seus pensamentos, histórias e experiências.

## Principais Tecnologias Utilizadas

- **PHP (com PDO):** Backend responsável pela lógica principal do sistema, manipulação de sessões, autenticação e operações CRUD com o banco de dados.
- **MySQL:** Banco de dados utilizado para armazenar usuários e diários.
- **HTML/CSS:** Estrutura e estilização das páginas, proporcionando uma interface agradável e responsiva.

## Funcionalidades e Fluxo Principal

- **Cadastro e Login:**
  - Usuários podem se registrar e fazer login de forma segura (hash de senha com `password_hash`).
  - Sessões garantem que só usuários autenticados possam acessar ou modificar seus próprios diários.

- **CRUD de Diários:**
  - **Criar Diário:** Formulário para adicionar título, descrição e conteúdo ao diário.
  - **Listar Diários:** Exibição dos diários do usuário, mostrando um resumo e data de criação.
  - **Editar Diário:** Possibilidade de atualizar título, descrição e conteúdo.
  - **Excluir Diário:** Remoção definitiva do diário.

- **Organização de Código:**
  - **src/functions/** – Lógica do cadastro e login.
  - **src/includes/** – Conexão com o banco e funções CRUD.
  - **src/views/** – Telas (login, registro, criação, edição, listagem).
  - **src/css/** – Estilização da interface.

## Principais Trechos de Código

- **Conexão com o banco (PDO):**
  ```php
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
  ```

- **Cadastro de usuário com proteção de senha:**
  ```php
  $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
  $stmt = $pdo->prepare('INSERT INTO user (nome, email, senha) VALUES (:nome, :email, :senha)');
  ```

- **CRUD dos diários:**
  ```php
  // Criar diário
  $stmt = $pdo->prepare("INSERT INTO diario (titulo, descricao, dt_criacao, id_user, conteudo) VALUES (:titulo, :descricao, :dt_criacao, :id_user, :conteudo)");
  // Editar diário
  $stmt = $pdo->prepare("UPDATE diario SET titulo = :titulo, descricao = :descricao, conteudo = :conteudo WHERE id = :id AND id_user = :user_id");
  // Excluir diário
  $stmt = $pdo->prepare("DELETE FROM diario WHERE id = :id AND id_user = :id_user");
  ```

- **Controle de acesso por sessão:**
  ```php
  session_start();
  if (!isset($_SESSION['usuario_id'])) {
      header('Location: index.php');
      exit();
  }
  ```

## Como Executar

1. Clone o repositório.
2. Configure o banco de dados MySQL conforme `src/includes/conexao.php`.
3. Hospede em um servidor com suporte a PHP.
4. Acesse `index.php` para registrar e começar a usar.

---

Projeto simples, didático e ideal para praticar PHP com banco de dados e autenticação!