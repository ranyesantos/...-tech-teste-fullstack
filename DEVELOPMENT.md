# Ordem de desenvolvimento

## Nesse esse projeto, a ordem que pretendo seguir para desenvolver é:

- modelagem -> frontend em blade + tailwind -> CI com GitHub Actions para rodar testes e outros comandos que forem necessários -> painel de admin com filament
- Eu pretendo também fazer testes com Pest enquanto desenvolvo as features, mas se eu notar que meu tempo ta curto vou acabar deixando os testes e a pipeline de CI de lado, infelizmente

# Modelagem

- Logo depois de fazer as configurações iniciais, eu comecei a olhar o design no figma para entender o funcionamento do sistema. Fui anotando e tentando entender tanto os relacionamentos entre tabelas quanto o funcionamento da aplicação em si.
- Depois de pegar uma visão geral do projeto, pedi ao Claude para gerar uma modelagem que fosse baseada no Reddit. Inicialmente ele me deu uma modelagem com votes e downvotes direto nas tabelas 'Posts' e 'Comments' e imaginei que isso não seria bom (mesmo que eu não soubesse exatamente o pq KKKKKK, mas pensei mais em questão de redundância). Depois de fazer algumas perguntas para a IA, entendi que dessa forma só seria possível guardar a quantidade de votos sem guardar quem votou. Então optei por usar uma tabela pivot com as colunas 'target_id' e 'target_type', que devem diferenciar comentários de posts, e com uma foreign key de id do usuário para guardar quem votou.

- Ainda sobre a modelagem, na tabela de comentários eu tentei entender e planejar bastante, sobre 3 pontos (pega a referência)
    1.  Como eu faria para permitir comentários aninhados
                - Logo de cara eu pensei que fosse ser tipo MUITO complicado fazer isso, mas depois de trocar uma ideia com a IA, não pareceu mais tão complicado assim. Por fim eu optei por usar uma foreign key nullable para própria tabela de comentário, que guarda o id do comentário pai e, caso um registro de comentário tenha valor nulo nessa coluna, significa que é um registro de comentário pai
    2.  Como eu faria para que "comentários filhos" não sejam apagados caso o "comentário pai" seja
                - Basicamente, soft deletes. E quando um comentário fosse "soft deletado", pensei em mostrar uma mensagem no frontend informando isso e se foi deletado por um admin por violar as regras da comunidade ou pelo próprio usuário
    3.  Como eu faria para que as replies ficassem aninhadas
                - Nesse caso eu acho que a melhor opção foi usar uma coluna 'depth_level' que inicia de 0, e cada reply pega o valor do depth_level da reply anterior e soma +1

# Frontend (Blade + Tailwind)

- Uma coisa que me fez perder muito tempo foi que depois de já ter desenvolvido alguns componentes, eu resolvi adicionar autenticação e descobri que quando o breeze é instalado, se eu quiser os componentes dele(eu queria), ele vai trazer também uma configuração predefinida de tailwind (isso faria com que eu perdesse todos os design tokens que tinha definido no app.css). Fiz pesquisas na internet, tentei com IA e não achei muita coisa que ajudasse. Depois de instalar e remover o breeze umas 5 vezes, comecei a fuçar pelos arquivos que ele adiciona quando é instalado e vi que o vite.config tinha mudado e que no package.json tinha sido instalada uma outra versão do tailwind e umas coisinhas a mais. Daí eu voltei o vite.config para o que era antes, deixei só uma versão do tailwind no package.json e funcionou :)

- Meu maior foco aqui foi fazer com que as telas ficassem o mais fiel possível ao design no figma em telas grandes, telas pequenas e dark/light mode. Foquei também em criar componentes reutilizáveis e isso ajudou bastante na questão da responsividade, já que o componente já estava responsivo em cada tela que era chamado

-   Sobre os design tokens das cores específicamente, eu preferi ir adicionando conforme fosse necessário durante o desenvolvimento porque imaginei que assim seria mais rápido, e acho que foi mesmo. O resto eu adicionei logo no começo mesmo. (Foi a primeira vez que adicionei design tokens a um projeto :O)

- Eu optei por centralizar os design tokens no `app.css` usando "`@theme inline`" e "`@layer base`" invés de definir no tailwind.config. Eu acho bem melhor tanto por questões de costume quanto por legibilidade, mas meio que foi uma decisão mais de gosto meu mesmo

# Painel de Admin (Filament)

- Fiz de uma forma simples. Basicamente em todos os resources eu optei por exibir os principais dados nas tabelas e ao clicar em um registro das tabelas, o administrador tem acesso aos registros em outras tabelas usando o `getRelations()`.
    - Ex: quando o adm clicar no registro de um usuário, ele vai conseguir ver quantos posts o usuário fez e de quais subreddits ele participa

# Backend

- Também optei pela simplicidade e inclusive, depois de ter criado alguns controllers, comecei a pensar que seria melhor ter criado Actions separadas, já que muita coisa que seriam feitas por controllers acabaram ficando por conta de componentes livewire. Acho que faria sentido principalmente para retornar os posts no feed da homepage. Pretendo pensar melhor sobre isso e refatorar se eu continuar achando que faz mais sentido
- Sobre os seeders, um tempo atrás o próprio Daniel me fez perceber a importância dos seeders pra simular um cenário de uso real da aplicação e eu passei um tempinho vendo esse PR aqui https://github.com/3pontos-tech/gil-benefits/pull/8/files e tentando fazer algo parecido em outro projeto, queria ter feito uma parada mais elaborada nos seeders desse projeto, mas preferi fazer simples que funcionasse mesmo, se não ia perder muito tempo

# Algumas coisas que mudaram no decorrer do desenvolvimento

### Modelagem

- antes, na tabela de votes e downvotes eu tinha utilizado as colunas 'target_id' e 'target_type' na intenção de fazer os votes de comentários e posts serem guardados na mesma tabela. Depois fui conversando com o chatgpt e acabei descobrindo uma funcionalidade chamada relacionamento polimórfico, que basicamente faz o que essas duas colunas fazem, só que de forma nativa, e acabei utilizando esse tipo de relacionamento, já que por ser nativo ia me possibilitar aproveitar mais o eloquent.

# Problemas "gerais"

- Em geral, eu tive alguns probleminhas que, se juntar tudo, me fizeram perder bastante tempo, como por exemplo um erro que o lint não tava rodando que tive logo no começo e alguns problemas que só depois de certo tempo eu resolvi rodando o comando "composer du"

# Considerações finais

- Esse projeto foi muito daora de desenvolver, principalmente por causa do livewire, que eu nunca tinha usado antes e agora vejo que o negócio é bão mesmo e agiliza muita coisa de forma muito simples
- Algumas funcionalidades provavelmente vão ficar faltando, e até agora eu não sei muito bem o que eu faria de diferente pra conseguir entregar mais funcionalidades a tempo
- O processo seletivo em si foi MUITO FODA, o primo tava no discord o tempo todo trocando ideia e dando dicas, então isso me deixou mais motivado pra desenvolver pq sabia que não ia ser só mais um projeto que eu entregaria as cegas sem nem saber se alguém realmente veria
