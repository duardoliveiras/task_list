CREATE SCHEMA IF NOT EXISTS task_list;
set search_path TO task_list;

DROP TABLE IF EXISTS tasks;

create table tasks(
	id SERIAL,
	title varchar(255) not null,
	description text not null,
	longDescription text,
	completed bool default false,
	createdAt date not null,
	completedAt date
);

     
insert into tasks(title, description, createdAt) values('University Project', 'Website of task-list', now());

select * from tasks;