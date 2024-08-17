create or replace table artorganizer.pastas
(
    id         int auto_increment
        primary key,
    nome_pasta varchar(20) not null,
    descricao  text        null
)
    collate = utf8mb4_general_ci;

create or replace table artorganizer.tags
(
    id       int auto_increment
        primary key,
    nome_tag varchar(100) not null
)
    collate = utf8mb4_general_ci;

create or replace table artorganizer.artigos
(
    ID               int auto_increment
        primary key,
    Titulo           varchar(255)         null,
    Autor            varchar(255)         null,
    Data_Publicacao  datetime             null,
    `img-previw`     varchar(100)         not null,
    `artigo-caminho` varchar(100)         not null,
    ID_Tag           int                  null,
    privacidade      enum ('priv', 'pub') not null,
    constraint artigos_ibfk_1
        foreign key (ID_Tag) references artorganizer.tags (id)
)
    collate = utf8mb4_general_ci;

create or replace table artorganizer.artigo_pasta
(
    id        int auto_increment
        primary key,
    id_pasta  int not null,
    id_artigo int not null,
    constraint artigo_pasta_ibfk_1
        foreign key (id_pasta) references artorganizer.pastas (id),
    constraint artigo_pasta_ibfk_2
        foreign key (id_artigo) references artorganizer.artigos (ID),
    constraint fk_artigos_artigo_pasta
        foreign key (id_artigo) references artorganizer.artigos (ID)
            on delete cascade
)
    collate = utf8mb4_general_ci;

create or replace index id_pasta
    on artorganizer.artigo_pasta (id_pasta);

create or replace index ID_Tag
    on artorganizer.artigos (ID_Tag);

create or replace table artorganizer.usuarios
(
    ID            int auto_increment
        primary key,
    Nome_Usuario  varchar(255)   not null,
    Senha         varchar(255)   not null,
    Nome_Completo varchar(255)   null,
    Email         varchar(255)   null,
    Data_Nasc     date           not null,
    telefone      int            null,
    `img-perfil`  varchar(1000)  null,
    permissoes    set ('1', '2') null
)
    collate = utf8mb4_general_ci;

create or replace table artorganizer.pasta_user
(
    id       int auto_increment
        primary key,
    id_user  int not null,
    id_pasta int not null,
    constraint pasta_user_ibfk_1
        foreign key (id_user) references artorganizer.usuarios (ID),
    constraint pasta_user_ibfk_2
        foreign key (id_pasta) references artorganizer.pastas (id)
)
    collate = utf8mb4_general_ci;

create or replace index id_pasta
    on artorganizer.pasta_user (id_pasta);

create or replace index id_user
    on artorganizer.pasta_user (id_user);

create or replace table artorganizer.rec_senha
(
    id             int auto_increment
        primary key,
    token          varchar(8) not null,
    id_user        int        not null,
    data_expiracao datetime   not null,
    constraint rec_senha_ibfk_1
        foreign key (id_user) references artorganizer.usuarios (ID)
)
    collate = utf8mb4_general_ci;

create or replace index id_user
    on artorganizer.rec_senha (id_user);

