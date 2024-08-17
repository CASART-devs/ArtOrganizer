-- Criação da base de dados
create or replace database artorganizer;

-- Seleção da base de dados para uso
use artorganizer;

-- Criação da tabela 'pastas'
create or replace table pastas
(
    id int auto_increment primary key,  -- Identificador único da pasta
    nome_pasta varchar(20) not null,    -- Nome da pasta
    descricao text null                 -- Descrição da pasta
)
    collate = utf8mb4_general_ci;       -- Collation para suportar caracteres especiais

-- Criação da tabela 'tags'
create or replace table tags
(
    id int auto_increment primary key,  -- Identificador único da tag
    nome_tag varchar(100) not null     -- Nome da tag
)
    collate = utf8mb4_general_ci;      -- Collation para suportar caracteres especiais

-- Criação da tabela 'artigos'
create or replace table artigos
(
    ID int auto_increment primary key,               -- Identificador único do artigo
    Titulo varchar(255) null,                        -- Título do artigo
    Autor varchar(255) null,                         -- Autor do artigo
    Data_Publicacao datetime null,                   -- Data de publicação
    `img-previw` varchar(100) not null,              -- Imagem de pré-visualização
    `artigo-caminho` varchar(100) not null,          -- Caminho do artigo
    ID_Tag int null,                                -- Referência à tag associada
    privacidade enum ('priv', 'pub') not null,      -- Privacidade do artigo
    constraint artigos_ibfk_1 foreign key (ID_Tag) references artorganizer.tags (id) -- Chave estrangeira para tags
)
    collate = utf8mb4_general_ci;                    -- Collation para suportar caracteres especiais

-- Criação da tabela 'artigo_pasta'
create or replace table artigo_pasta
(
    id int auto_increment primary key,              -- Identificador único da relação artigo-pasta
    id_pasta int not null,                          -- Referência à pasta
    id_artigo int not null,                         -- Referência ao artigo
    constraint artigo_pasta_ibfk_1
        foreign key (id_pasta) references artorganizer.pastas (id), -- Chave estrangeira para pastas
    constraint artigo_pasta_ibfk_2
        foreign key (id_artigo) references artorganizer.artigos (ID) -- Chave estrangeira para artigos
)
    collate = utf8mb4_general_ci;                    -- Collation para suportar caracteres especiais

-- Criação do índice para a coluna 'id_pasta' na tabela 'artigo_pasta'
create or replace index id_pasta
    on artorganizer.artigo_pasta (id_pasta);

-- Criação do índice para a coluna 'ID_Tag' na tabela 'artigos'
create or replace index ID_Tag
    on artorganizer.artigos (ID_Tag);

-- Criação da tabela 'usuarios'
create or replace table usuarios
(
    ID int auto_increment primary key,           -- Identificador único do usuário
    Nome_Usuario varchar(255) not null,          -- Nome de usuário
    Senha varchar(255) not null,                 -- Senha do usuário
    Nome_Completo varchar(255) null,            -- Nome completo do usuário
    Email varchar(255) null,                     -- Email do usuário
    Data_Nasc date not null,                     -- Data de nascimento
    telefone int null,                           -- Telefone do usuário
    `img-perfil` varchar(1000) null,             -- Imagem de perfil
    permissoes set ('1', '2') null               -- Permissões do usuário
)
    collate = utf8mb4_general_ci;                -- Collation para suportar caracteres especiais

-- Criação da tabela 'pasta_user'
create or replace table artorganizer.pasta_user
(
    id int auto_increment primary key,              -- Identificador único da relação pasta-usuário
    id_user int not null,                           -- Referência ao usuário
    id_pasta int not null,                          -- Referência à pasta
    constraint pasta_user_ibfk_1
        foreign key (id_user) references artorganizer.usuarios (ID), -- Chave estrangeira para usuários
    constraint pasta_user_ibfk_2
        foreign key (id_pasta) references artorganizer.pastas (id) -- Chave estrangeira para pastas
)
    collate = utf8mb4_general_ci;                    -- Collation para suportar caracteres especiais

-- Criação do índice para a coluna 'id_pasta' na tabela 'pasta_user'
create or replace index id_pasta
    on artorganizer.pasta_user (id_pasta);

-- Criação do índice para a coluna 'id_user' na tabela 'pasta_user'
create or replace index id_user
    on artorganizer.pasta_user (id_user);

-- Criação da tabela 'rec_senha'
create or replace table artorganizer.rec_senha
(
    id int auto_increment primary key,            -- Identificador único do registro de senha
    token varchar(8) not null,                    -- Token de recuperação de senha
    id_user int not null,                         -- Referência ao usuário
    data_expiracao datetime not null,             -- Data de expiração do token
    constraint rec_senha_ibfk_1
        foreign key (id_user) references artorganizer.usuarios (ID) -- Chave estrangeira para usuários
)
    collate = utf8mb4_general_ci;                -- Collation para suportar caracteres especiais

-- Criação do índice para a coluna 'id_user' na tabela 'rec_senha'
create or replace index id_user
    on artorganizer.rec_senha (id_user);
