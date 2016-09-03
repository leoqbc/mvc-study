create table users
(
	id int primary key auto_increment,
	nome varchar(130) not null,
	email varchar(100) not null,
	senha varchar(255) not null
);

create table posts
(
	id int primary key auto_increment,
	users_id int not null,
	titulo varchar(160) not null,
	texto text not null,
	img_url varchar(100) not null,
	foreign key (users_id) 
		references users(id)
);

create table likes
(
	id int primary key auto_increment,
	posts_id int not null,
	users_id int not null,
	unique (users_id, posts_id),
	foreign key (users_id) 
		references users(id),
	foreign key (posts_id) 
		references posts(id)
);
