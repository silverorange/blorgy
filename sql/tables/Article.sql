alter table Article add column instance integer references Instance(id)
	on delete cascade;

create index Article_instance_index on Article(instance);
