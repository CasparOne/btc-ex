create table currency
(
  id        int unsigned auto_increment
    primary key,
  curr_name tinytext not null
);

create table accounts
(
  id          bigint unsigned auto_increment,
  acc_id      bigint unsigned        not null,
  user_id     bigint unsigned        not null,
  amount      float default 0        not null,
  currency_id int unsigned default 1 not null,
  constraint id
  unique (id),
  constraint accounts_currencies_id_fk
  foreign key (currency_id) references currency (id)
);

create table transactions
(
  id         int auto_increment
    primary key,
  account_id bigint unsigned                         null,
  tr_no      bigint unsigned                         null,
  amount     float                                   null,
  created_at timestamp default current_timestamp()   not null,
  updated_at timestamp default '0000-00-00 00:00:00' not null,
  constraint transaction_tr_no_uindex
  unique (tr_no),
  constraint transaction_accounts_id_fk
  foreign key (account_id) references accounts (id)
);

create table users
(
  id         bigint unsigned auto_increment
    primary key,
  account_id bigint unsigned                         null,
  blocked    tinyint default 0                       not null,
  login      varchar(255)                            null,
  password   varchar(260)                            not null,
  name       varchar(255) default 'Unknown'          not null,
  email      varchar(255)                            not null,
  is_admin   tinyint default 0                       not null,
  created_at timestamp default current_timestamp()   not null
  on update current_timestamp(),
  updated_at timestamp default '0000-00-00 00:00:00' not null,
  constraint users_email_uindex
  unique (email),
  constraint users_login_uindex
  unique (login),
  constraint users_name_uindex
  unique (name),
  constraint users_accounts_id_fk
  foreign key (account_id) references accounts (id)
);

