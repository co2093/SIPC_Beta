--Base cambios:


alter table public.inventario alter column idproyectoinventario drop not null;

alter table public.inventario rename column idunidad to cantidad;

alter table public.inventario rename column marca to ubicacion;

alter table public.inventario rename column modelo to especificacion;


alter table public.inventario drop constraint fk_inventar_ubicacion_unidad_i;



alter table public.convocatoria
add estado numeric(1,0);



alter table public.convocatoria
add presupuesto numeric(10,2);




alter table public.proyecto alter column id drop not null
alter table public.proyecto add tiempo integer;



alter table public.proyecto
add investigador varchar(256);



alter table public.proyecto rename column investigador to usuario;



create table public.objetivo(
	idobjetivo serial,
	descripcion varchar(512),
	tipo int,
	idproyecto int
);



alter table public.actividad alter column resultadosesperados drop not null;





ALTER TABLE public.actividad DROP CONSTRAINT fk_activida_objetivo__proy_obj;



create table public.colaboradores(
	idcolaborador serial,
	nombrecompleto varchar(256),
	adhonorem int,
	idfacultad int,
	sexo int,
	idtipocolaborador int	
);




create table public.tipocolaborador(
idtipo serial,
nombretipocolaborador varchar(128)	
);


alter table public.colaboradores add idproyecto integer;


alter table public.presupuesto add disponible numeric(10,2);





alter table public.pre_recurso
add idactividad int;




create table public.rubro_presupuesto(
	id serial,
	idpresupuesto int,
	idproyecto int,
	recursos numeric default 0.0,
	contrataciones numeric default 0.0,
	nacionales numeric default 0.0,
	internacionales numeric default 0.0,
	publicaciones numeric default 0.0
	
);



create table public.pasos_registro(
	id serial,
	idproyecto int,
	titulo int default 0.0,
	objetivos int default 0.0,
	actividades int default 0.0,
	presupuesto int default 0.0,
	colaboradores int default 0.0,
	protocolo int default 0
	
);





create table public.pasos_registro(
	id serial,
	idproyecto int,
	titulo int default 0.0,
	objetivos int default 0.0,
	actividades int default 0.0,
	presupuesto int default 0.0,
	colaboradores int default 0.0,
	protocolo int default 0
	
);




create table public.pre_contratacion
(
idcontratacion serial,	
idactividad int,
idtipocontratacion int,
pago numeric(10,2),
dias int,
total numeric(10,2),
sexo int,
nombrecompleto varchar(256)

);



create table public.tipo_contratacion
(
idtipocontratacion serial,	
nombretipocontratacion varchar(128)	
);



alter table public.pre_viaje_local
add idactividad int;


alter table public.pre_viaje_exterior
add idactividad int;

alter table public.pre_viaje_exterior
alter column idcuotaviatico drop not null;



alter table public.pre_viaje_exterior
add idfuente int;


alter table public.pre_fuente
add idrubro int;


create table public.presupuesto_inicial(
	idpresupuestoinical serial,
	idproyecto int,
	montocontratacion numeric(12,2) default 0.0,
	montorecursos numeric(12,2) default 0.0,
	montonacionales numeric(12,2) default 0.0,
	montointernacionales numeric(12,2) default 0.0,
	montopublicaciones numeric(12,2) default 0.0,
	montoconvocatoria numeric(12,2) default 0.0,
	montodisponible numeric(12,2) default 0.0
	
);



Base - cambios:


alter table public.inventario alter column idproyectoinventario drop not null;

alter table public.inventario rename column idunidad to cantidad;

alter table public.inventario rename column marca to ubicacion;

alter table public.inventario rename column modelo to especificacion;


alter table public.inventario drop constraint fk_inventar_ubicacion_unidad_i;



alter table public.convocatoria
add estado numeric(1,0);



alter table public.convocatoria
add presupuesto numeric(10,2);




alter table public.proyecto alter column id drop not null;
alter table public.proyecto add tiempo integer;



alter table public.proyecto
add investigador varchar(256);



alter table public.proyecto rename column investigador to usuario;



create table public.objetivo(
	idobjetivo serial,
	descripcion varchar(512),
	tipo int,
	idproyecto int
);



alter table public.actividad alter column resultadosesperados drop not null;





ALTER TABLE public.actividad DROP CONSTRAINT fk_activida_objetivo__proy_obj;



create table public.colaboradores(
	idcolaborador serial,
	nombrecompleto varchar(256),
	adhonorem int,
	idfacultad int,
	sexo int,
	idtipocolaborador int	
);




create table public.tipocolaborador(
idtipo serial,
nombretipocolaborador varchar(128)	
);


alter table public.colaboradores add idproyecto integer;


alter table public.presupuesto add disponible numeric(10,2);





alter table public.pre_recurso
add idactividad int;




create table public.rubro_presupuesto(
	id serial,
	idpresupuesto int,
	idproyecto int,
	recursos numeric default 0.0,
	contrataciones numeric default 0.0,
	nacionales numeric default 0.0,
	internacionales numeric default 0.0,
	publicaciones numeric default 0.0
	
);



create table public.pasos_registro(
	id serial,
	idproyecto int,
	titulo int default 0.0,
	objetivos int default 0.0,
	actividades int default 0.0,
	presupuesto int default 0.0,
	colaboradores int default 0.0,
	protocolo int default 0
	
);





create table public.pasos_registro(
	id serial,
	idproyecto int,
	titulo int default 0.0,
	objetivos int default 0.0,
	actividades int default 0.0,
	presupuesto int default 0.0,
	colaboradores int default 0.0,
	protocolo int default 0
	
);




create table public.pre_contratacion
(
idcontratacion serial,	
idactividad int,
idtipocontratacion int,
pago numeric(10,2),
dias int,
total numeric(10,2),
sexo int,
nombrecompleto varchar(256)

);



create table public.tipo_contratacion
(
idtipocontratacion serial,	
nombretipocontratacion varchar(128)	
);



alter table public.pre_viaje_local
add idactividad int;


alter table public.pre_viaje_exterior
add idactividad int;

alter table public.pre_viaje_exterior
alter column idcuotaviatico drop not null;



alter table public.pre_viaje_exterior
add idfuente int;


alter table public.pre_fuente
add idrubro int;


create table public.presupuesto_inicial(
	idpresupuestoinical serial,
	idproyecto int,
	montocontratacion numeric(12,2) default 0.0,
	montorecursos numeric(12,2) default 0.0,
	montonacionales numeric(12,2) default 0.0,
	montointernacionales numeric(12,2) default 0.0,
	montopublicaciones numeric(12,2) default 0.0,
	montoconvocatoria numeric(12,2) default 0.0,
	montodisponible numeric(12,2) default 0.0
	
);


alter table public.pre_viaje_local drop constraint fk_pre_viaj_viaje_loc_pre_fuen;

alter table public.pre_recurso 
	alter column idfuente drop not null;


alter table public.tipo_contratacion
add pagoporhora numeric(12,2);


alter table public.pre_contratacion
add idfuente int;


create table public.pasos_presupuesto(
	id serial,
	idproyecto int,
	fuentes int default 0,
	recursos int default 0,
	contrataciones int default 0,
	nacionales int default 0,
	internacionales int default 0,
	pulicaciones int default 0	
);


ALTER TABLE public.pre_fuente 
	DROP CONSTRAINT fk_pre_fuen_fuente_presupue;



alter table public.pre_recurso
add montoconvocatoria numeric(12,2);


ALTER TABLE public.pre_recurso 
	DROP CONSTRAINT fk_pre_recu_recursos_presupue;
