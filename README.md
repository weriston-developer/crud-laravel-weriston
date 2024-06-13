Claro! Aqui está o README atualizado para incluir os comandos de teste:

### README

# Gerenciamento de Produtos

Este projeto é um sistema de gerenciamento de produtos desenvolvido utilizando o framework Laravel. Ele permite a criação, edição, visualização e exclusão de produtos.




## Arquivo .sql 

Está Localizado na pasta database arquivo query.sql

## Funcionalidades

- **Listagem de Produtos**: Visualize todos os produtos cadastrados.
- **Criação de Produtos**: Adicione novos produtos ao sistema.
- **Edição de Produtos**: Edite informações dos produtos existentes.
- **Exclusão de Produtos**: Remova produtos do sistema.

## Requisitos

- PHP >= 7.3
- Composer
- MySQL
- Node.js (para compilação de ativos front-end)

## Instalação

1. **Clone o repositório**

   ```bash
   git clone https://github.com/seu-usuario/nome-do-projeto.git
   cd nome-do-projeto
   ```

2. **Instale as dependências do Composer**

   ```bash
   composer install
   ```

3. **Configure o arquivo .env**

   Copie o arquivo `.env.example` para `.env` e ajuste as configurações do banco de dados:

   ```bash
   cp .env.example .env
   ```

4. **Gere a chave da aplicação**

   ```bash
   php artisan key:generate
   ```

5. **Configure o banco de dados**

   Crie um banco de dados no MySQL e ajuste as configurações no arquivo `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome_do_banco_de_dados
   DB_USERNAME=seu_usuario
   DB_PASSWORD=sua_senha
   ```

6. **Execute as migrações**

   ```bash
   php artisan migrate
   ```

7. **Instale as dependências do NPM e compile os ativos**

   ```bash
   npm install
   npm run dev
   ```

## Uso

1. **Inicie o servidor de desenvolvimento**

   ```bash
   php artisan serve
   ```

2. **Acesse o sistema**

   Abra o navegador e vá para `http://localhost:8000`.

## Testes

Para executar os testes, utilize o comando:

```bash
php artisan test
```

## Estrutura do Projeto

- **Models**
  - `Product.php`: Define o modelo de produto.

- **Controllers**
  - `ProductController.php`: Controlador principal para manipulação dos produtos.

- **Views**
  - `index.blade.php`: Exibe a lista de produtos.
  - `create.blade.php`: Formulário para criação de novos produtos.
  - `edit.blade.php`: Formulário para edição de produtos existentes.

## Rotas

- `GET /produtos`: Lista todos os produtos.
- `GET /produtos/create`: Formulário de criação de novo produto.
- `POST /produtos`: Armazena um novo produto.
- `GET /produtos/{id}/edit`: Formulário de edição de produto.
- `PUT /produtos/{id}`: Atualiza um produto existente.
- `DELETE /produtos/{id}`: Exclui um produto.

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir uma issue ou enviar um pull request.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).

---

**Notas:**

- Certifique-se de ajustar os comandos e configurações conforme necessário para o seu ambiente de desenvolvimento.
- Atualize os links e informações de acordo com os detalhes específicos do seu projeto.