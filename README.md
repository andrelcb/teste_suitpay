
### Passo a passo
Clone Repositório
```sh
git clone https://github.com/andrelcb/teste_suitpay.git
```
```sh
cd app-laravel
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=Andre
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container app
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```
Execute o comando
```sh
npm run dev
```


Acesse o projeto
[http://localhost:8989](http://localhost:8989)


Ao entrar no projeto sera necessário criar uma conta, e logar.
Após logar voce sera redireiconado para tela de dashboard.
Nessa tela tem a aba de alunos e cursos, e dentro da aba de cursos, apos cadastrar um curso vai exibir a listagem,
na listagem tem um botao de detalhes, onde voce vai matricular o aluno e exibir os alunos matriculados.

Para deletar um item da lista, é necessário entrar dentro da tela de detalhes.
