# TESTE TÉCNICO - PHP

Este é um teste técnico utilizando **PHP**, **SQLite** e **Bootstrap**.

## Parte 1

Navegue até a pasta onde o arquivo `suportes-balanceados.php.` se encontra e execute o comando `php suportes-balanceados.php` para testá-lo.

## Parte 2 e 3

### Configuração

#### 1. Habilitar Extensões do SQLite

Para que o PHP possa se comunicar com o banco de dados SQLite, é necessário habilitar as extensões sqlite3 e pdo_sqlite no arquivo de configuração do PHP (php.ini).
Antes de rodar o projeto, certifique-se de que as extensões do SQLite estão habilitadas no PHP. No arquivo `php.ini`, remova o `;` das seguintes linhas:

```
;extension=sqlite3
;extension=pdo_sqlite
```

Após a alteração, deve ficar assim:

```
extension=sqlite3
extension=pdo_sqlite
```

#### 2. Configurar o Banco de Dados

Antes de iniciar o projeto, execute o seguinte comando para criar o banco de dados e a tabela `usuarios`:

```sh
php setup-database.php
```

#### 3. Iniciar o Servidor

Para rodar o projeto localmente, execute o comando abaixo no terminal:

```sh
php -S localhost:8000
```

Depois, acesse `http://localhost:8000` no navegador.