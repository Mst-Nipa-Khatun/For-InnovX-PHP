create table users
(
    id         int auto_increment                  primary key,
    userName   varchar(255)                        not null,
    email      varchar(255)                        not null,
    password   varchar(255)                        not null,
    education  varchar(255)                        not null,
    age        int                                 not null,
    picture    varchar(255)                        null,
    status     int                                 null,
    created_at timestamp default CURRENT_TIMESTAMP null,
    constraint userName
        unique (userName)
);


