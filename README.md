# Projeto de Programação WEB I - UNIDAVI

Este projeto faz parte da disciplina de Programação WEB I na UNIDAVI. É uma aplicação simples de gerenciamento de clientes com PHP orientado a objetos e banco de dados PostgreSQL.

## Acesso

O usuário e senha padrão para acesso à aplicação são:
- Usuário: `usuario`
- Senha: `senha`

## Configuração do Banco de Dados

Para utilizar este projeto localmente, siga as instruções abaixo para configurar o banco de dados PostgreSQL:

### Criação das Tabelas

```sql
-- Criação da tabela cliente
CREATE TABLE tbcliente (
    clicodigo SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL
);

-- Criação da tabela contato com referência à tabela cliente
CREATE TABLE tbcontato (
    concodigo SERIAL PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    clicodigo INT NOT NULL,
    FOREIGN KEY (clicodigo) REFERENCES tbcliente (clicodigo)
);

-- Inserindo registros padrão
INSERT INTO tbcliente (nome, sobrenome, data_nascimento)
VALUES ('Maria', 'Silva', '1990-05-15'),
       ('João', 'Santos', '1985-09-22'),
       ('Pedro', 'Oliveira', '1978-12-10');

INSERT INTO tbcontato (email, telefone, clicodigo)
VALUES ('maria@example.com', '123456789', 1), 
       ('joao@example.com', '987654321', 2),     
       ('pedro@example.com', '456789123', 3); 
```

## Rodando o Projeto Localmente

Para rodar o projeto localmente, siga estas etapas:

1. Configure um servidor local PHP, como XAMPP ou WAMP.
2. Clone este repositório para o diretório do servidor web local.
3. Importe o banco de dados usando as instruções fornecidas acima.
4. Certifique-se de ter o PostgreSQL instalado e configurado.
5. Inicie o servidor local.
6. Acesse a aplicação pelo navegador usando `http://localhost/seu_diretorio`.

## Funcionalidades

- Login com usuário e senha padrão.
- Cadastro de clientes com nome, sobrenome, data de nascimento, e-mail e telefone.
- Listagem de clientes.
- Filtro de clientes por aproximação no nome.

Este projeto foi desenvolvido como parte do aprendizado em Programação WEB I na UNIDAVI. Qualquer dúvida ou sugestão, entre em contato.