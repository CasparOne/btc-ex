create table currency
(
  id         int unsigned auto_increment
    primary key,
  digit_code varchar(3)   not null,
  curr_name  varchar(3)   not null,
  name       varchar(255) not null,
  constraint currency_digit_code_uindex
  unique (digit_code)
);

create table users
(
  id         bigint unsigned auto_increment
    primary key,
  blocked    tinyint default 0                       not null,
  login      varchar(255)                            null,
  password   varchar(260)                            not null,
  name       varchar(255) default 'Unknown'          not null,
  email      varchar(255)                            not null,
  is_admin   tinyint default 0                       not null,
  created_at timestamp default current_timestamp()   not null
  on update current_timestamp(),
  updated_at timestamp default '0000-00-00 00:00:00' not null,
  activated  tinyint(1) default 1                    not null,
  constraint users_email_uindex
  unique (email),
  constraint users_login_uindex
  unique (login)
);

create table accounts
(
  id          bigint unsigned        not null,
  user_id     bigint unsigned        not null,
  amount      float default 0        not null,
  currency_id int unsigned default 1 not null,
  updated_at  timestamp              null,
  created_at  timestamp              null,
  constraint accounts_acc_id_uindex
  unique (id),
  constraint accounts_currency_id_fk
  foreign key (currency_id) references currency (id),
  constraint accounts_users_id_fk
  foreign key (user_id) references users (id)
    on update cascade
    on delete cascade
);

create index accounts_user_id_index
  on accounts (user_id);

alter table accounts
  add primary key (id);

create table transactions
(
  id         int auto_increment
    primary key,
  account_id bigint unsigned                         null,
  tr_no      varchar(36)                             not null,
  amount     float                                   null,
  created_at timestamp default current_timestamp()   not null,
  updated_at timestamp default '0000-00-00 00:00:00' not null,
  constraint transactions_pk
  unique (account_id, tr_no),
  constraint transactions_accounts_id_fk
  foreign key (account_id) references accounts (id)
    on update cascade
    on delete cascade
);

