# SuplementosFacil

O SuplementosFácil é um sistema web desenvolvido para facilitar o gerenciamento e a comparação de suplementos alimentares.
Ele oferece um painel administrativo para cadastro e manutenção de suplementos, categorias, nutrientes e usuários, além de uma interface pública onde os visitantes podem encontrar diversos produtos e comparar suas características nutricionais.

Estrutura do Projeto

A aplicação segue uma arquitetura MVC (Model-View-Controller) em PHP:

 	Models
• 	Representam as entidades principais: suplemento, categoria, usuario e nutriente.
• 	Contêm atributos e métodos de acesso (getters/setters).


 	DAO (Data Access Objects)
• 	Responsáveis pela comunicação com o banco de dados.
• 	Exemplos: SuplementoDAO, CategoriaDAO, UsuarioDAO, NutrienteDAO


	Controllers
• 	Contêm a lógica de negócio e coordenam a interação entre Models e Views.
• 	Exemplos:
- SuplementoController: CRUD de suplementos e vínculo com nutrientes.
- CategoriaController: gerenciamento de categorias.
- UsuarioController: cadastro, login e autenticação.
- SuplementosNutrientesController: vinculação suplemento ↔ nutrientes.


    Views
• 	Arquivos PHP/HTML responsáveis pela interface com o usuário.
• 	Exemplos:
- listar.php (suplementos, categorias, usuários)
- cadastrar.php e editar.php (formularios)
- login.php (autenticação)
- comparar.php (comparação de suplementos)


	Public
• 	Pasta com recursos estáticos (CSS, imagens).
• 	As imagens dos suplementos ficam em public/imagens/


Principais Funcionalidades

 Painel Administrativo
• 	Login e logout de usuários.
• 	Cadastro e edição de usuários com validação.
• 	CRUD de categorias.
• 	CRUD de suplementos, incluindo:
• 	Nome, marca, preço, sabor, calorias.
• 	Quantidade total e por porção (com unidade de medida).
• 	Forma de apresentação.
• 	Restrições alimentares (vegano, contém glúten, contém lactose).
• 	Associação de nutrientes e suas quantidades.


 Interface Pública
• 	Listagem de suplementos em formato de cards.
• 	Cesta de comparação: o usuário pode adicionar até 3 suplementos para comparar.
• 	Comparação detalhada em tabela:
• 	Preço.
• 	Imagem.
• 	Nutrientes (com destaque visual para maior, menor ou igual).
• 	Restrições alimentares.


  Responsividade
• 	Todas as views possuem media queries para adaptação em dispositivos móveis.
• 	Tabelas se transformam em cards responsivos em telas pequenas.


 Funcionalidades Extras
• 	Feedback visual ao adicionar suplementos à cesta.
• 	Drag & Drop: suplementos podem ser arrastados para a cesta.
• 	Validações em JavaScript nos formulários (nome, email, senha, telefone).
• 	Footer padronizado em todas as páginas.


O projeto contém um arquivo .sql com o banco e suas inserções, menos a da imagem que está
localizada na propria maquina.