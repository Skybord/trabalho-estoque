# 📦 Sistema de Controle de Estoque (MVC)

Projeto Final desenvolvido para o curso de Análise e Desenvolvimento de Sistemas (Fema). Este sistema web foi construído aplicando a arquitetura **MVC (Model-View-Controller)**, focado em gerenciar operações de entrada e saída de produtos de um estoque.

## 🛠️ Tecnologias Utilizadas

* **Linguagem:** PHP
* **Arquitetura:** Padrão MVC
* **Banco de Dados:** MySQL (ou equivalente utilizado no projeto)
* **Frontend:** HTML5, CSS3 

## 📂 Estrutura do Projeto

O projeto está organizado da seguinte forma para respeitar o padrão MVC:

* `/controller`: Contém as classes responsáveis por intermediar as requisições do usuário, acessar os modelos e retornar as views correspondentes.
* `/model`: Contém as classes que representam as regras de negócio e a comunicação direta com o banco de dados.
* `/view`: Contém as interfaces de usuário (telas) desenvolvidas em HTML/PHP.
* `index.php`: Ponto de entrada da aplicação (Front Controller).

## 🚀 Como rodar o projeto localmente

Siga os passos abaixo para testar o sistema na sua máquina:

1. Certifique-se de ter um servidor local configurado (como **XAMPP**, **WAMP** ou **Laragon**).
2. Faça o clone deste repositório dentro da pasta pública do seu servidor (ex: `htdocs` no XAMPP):
```bash
   git clone [https://github.com/Skybord/trabalho-estoque.git](https://github.com/Skybord/trabalho-estoque.git)
