create table category
(
    id        bigint auto_increment
        primary key,
    parentId  bigint       null,
    title     varchar(75)  not null,
    metaTitle varchar(100) null,
    slug      varchar(100) not null,
    content   text         null,
    constraint fk_category_parent
        foreign key (parentId) references category (id)
);

create index idx_category_parent
    on category (parentId);

create table user
(
    id           bigint auto_increment
        primary key,
    firstName    varchar(50)          null,
    middleName   varchar(50)          null,
    lastName     varchar(50)          null,
    mobile       varchar(15)          null,
    email        varchar(50)          null,
    passwordHash varchar(32)          not null,
    admin        tinyint(1) default 0 not null,
    vendor       tinyint(1) default 0 not null,
    registeredAt datetime             not null,
    lastLogin    datetime             null,
    intro        tinytext             null,
    profile      text                 null,
    gender       tinyint              null,
    constraint uq_email
        unique (email),
    constraint uq_mobile
        unique (mobile)
);

create table cart
(
    id         bigint auto_increment
        primary key,
    userId     bigint             null,
    sessionId  varchar(100)       not null,
    token      varchar(100)       not null,
    status     smallint default 0 not null,
    firstName  varchar(50)        null,
    middleName varchar(50)        null,
    lastName   varchar(50)        null,
    mobile     varchar(15)        null,
    email      varchar(50)        null,
    line1      varchar(50)        null,
    line2      varchar(50)        null,
    city       varchar(50)        null,
    province   varchar(50)        null,
    country    varchar(50)        null,
    createdAt  datetime           not null,
    updatedAt  datetime           null,
    content    text               null,
    constraint fk_cart_user
        foreign key (userId) references user (id)
);

create index idx_cart_user
    on cart (userId);

create table `order`
(
    id           bigint auto_increment
        primary key,
    userId       bigint             null,
    sessionId    varchar(100)       not null,
    token        varchar(100)       not null,
    status       smallint default 0 not null,
    subTotal     float    default 0 not null,
    itemDiscount float    default 0 not null,
    tax          float    default 0 not null,
    shipping     float    default 0 not null,
    total        float    default 0 not null,
    promo        varchar(50)        null,
    discount     float    default 0 not null,
    grandTotal   float    default 0 not null,
    firstName    varchar(50)        null,
    middleName   varchar(50)        null,
    lastName     varchar(50)        null,
    mobile       varchar(15)        null,
    email        varchar(50)        null,
    line1        varchar(50)        null,
    line2        varchar(50)        null,
    city         varchar(50)        null,
    province     varchar(50)        null,
    country      varchar(50)        null,
    createdAt    datetime           not null,
    updatedAt    datetime           null,
    content      text               null,
    constraint fk_order_user
        foreign key (userId) references user (id)
);

create index idx_order_user
    on `order` (userId);

create table product
(
    id          bigint auto_increment
        primary key,
    userId      bigint               not null,
    title       varchar(75)          not null,
    metaTitle   varchar(100)         null,
    slug        varchar(100)         not null,
    summary     tinytext             null,
    type        smallint   default 0 not null,
    sku         varchar(100)         not null,
    price       float      default 0 not null,
    discount    float      default 0 not null,
    quantity    smallint   default 0 not null,
    shop        tinyint(1) default 0 not null,
    createdAt   datetime             not null,
    updatedAt   datetime             null,
    publishedAt datetime             null,
    startsAt    datetime             null,
    endsAt      datetime             null,
    content     text                 null,
    constraint uq_slug
        unique (slug),
    constraint fk_product_user
        foreign key (userId) references user (id)
);

create table cart_item
(
    id        bigint auto_increment
        primary key,
    productId bigint               not null,
    cartId    bigint               not null,
    sku       varchar(100)         not null,
    price     float      default 0 not null,
    discount  float      default 0 not null,
    quantity  smallint   default 0 not null,
    active    tinyint(1) default 0 not null,
    createdAt datetime             not null,
    updatedAt datetime             null,
    content   text                 null,
    constraint fk_cart_item_cart
        foreign key (cartId) references cart (id),
    constraint fk_cart_item_product
        foreign key (productId) references product (id)
);

create index idx_cart_item_cart
    on cart_item (cartId);

create index idx_cart_item_product
    on cart_item (productId);

create table order_item
(
    id        bigint auto_increment
        primary key,
    productId bigint             not null,
    orderId   bigint             not null,
    sku       varchar(100)       not null,
    price     float    default 0 not null,
    discount  float    default 0 not null,
    quantity  smallint default 0 not null,
    createdAt datetime           not null,
    updatedAt datetime           null,
    content   text               null,
    constraint fk_order_item_order
        foreign key (orderId) references `order` (id),
    constraint fk_order_item_product
        foreign key (productId) references product (id)
);

create index idx_order_item_order
    on order_item (orderId);

create index idx_order_item_product
    on order_item (productId);

create index idx_product_user
    on product (userId);

create table product_category
(
    productId  bigint not null,
    categoryId bigint not null,
    primary key (productId, categoryId),
    constraint fk_pc_category
        foreign key (categoryId) references category (id),
    constraint fk_pc_product
        foreign key (productId) references product (id)
);

create index idx_pc_category
    on product_category (categoryId);

create index idx_pc_product
    on product_category (productId);

create table product_meta
(
    id        bigint auto_increment
        primary key,
    productId bigint      not null,
    `key`     varchar(50) not null,
    content   text        null,
    constraint uq_product_meta
        unique (productId, `key`),
    constraint fk_meta_product
        foreign key (productId) references product (id)
);

create index idx_meta_product
    on product_meta (productId);

create table product_review
(
    id          bigint auto_increment
        primary key,
    productId   bigint               not null,
    parentId    bigint               null,
    title       varchar(100)         not null,
    rating      smallint   default 0 not null,
    published   tinyint(1) default 0 not null,
    createdAt   datetime             not null,
    publishedAt datetime             null,
    content     text                 null,
    userId      bigint               null,
    constraint fk_review_parent
        foreign key (parentId) references product_review (id),
    constraint fk_review_product
        foreign key (productId) references product (id),
    constraint product_review_ibfk_1
        foreign key (userId) references user (id)
);

create index idx_review_parent
    on product_review (parentId);

create index idx_review_product
    on product_review (productId);

create index userId
    on product_review (userId);

create table transaction
(
    id        bigint auto_increment
        primary key,
    userId    bigint             not null,
    orderId   bigint             not null,
    code      varchar(100)       not null,
    type      smallint default 0 not null,
    mode      smallint default 0 not null,
    status    smallint default 0 not null,
    createdAt datetime           not null,
    updatedAt datetime           null,
    content   text               null,
    constraint fk_transaction_order
        foreign key (orderId) references `order` (id),
    constraint fk_transaction_user
        foreign key (userId) references user (id)
);

create index idx_transaction_order
    on transaction (orderId);

create index idx_transaction_user
    on transaction (userId);


