select fecha.registro, 
        cliente.nombre, 
        responsable.nombre, 
        proyecto.oportunidad, 
        contacto.nombre, 
        contacto.apellido
from fecha, cliente, responsable, proyecto, contacto
where fecha.proyecto_idproyecto = proyecto.idproyecto 
AND fecha.contacto_idcontacto = contacto.idcontacto
AND fecha.responsable_idresponsable = responsable.idresponsable 
AND contacto.cliente_idcliente = cliente.idcliente
order by proyecto.idproyecto


/******************funciona**********************/
select fecha.registro, proyecto.oportunidad
from fecha, proyecto
where fecha.proyecto_idproyecto = proyecto.idproyecto


/******************funciona**********************/
select fecha.registro, proyecto.oportunidad, contacto.nombre
from fecha, proyecto, contacto
where fecha.proyecto_idproyecto = proyecto.idproyecto 
AND fecha.contacto_idcontacto = contacto.idcontacto


/******************funciona**********************/
select fecha.registro, responsable.nombre, proyecto.oportunidad, contacto.nombre
from fecha, responsable, proyecto, contacto
where fecha.proyecto_idproyecto = proyecto.idproyecto 
AND fecha.contacto_idcontacto = contacto.idcontacto
AND fecha.responsable_idresponsable = responsable.idresponsable


/******************funciona**********************/
select fecha.registro, cliente.nombre, responsable.nombre, proyecto.oportunidad, contacto.nombre
from fecha, cliente, responsable, proyecto, contacto
where fecha.proyecto_idproyecto = proyecto.idproyecto 
AND fecha.contacto_idcontacto = contacto.idcontacto
AND fecha.responsable_idresponsable = responsable.idresponsable 
AND contacto.cliente_idcliente = cliente.idcliente


/******************funciona**********************/
select fecha.registro, cliente.nombre, responsable.nombre, proyecto.oportunidad, contacto.nombre
from fecha, cliente, responsable, proyecto, contacto
where fecha.proyecto_idproyecto = proyecto.idproyecto 
AND fecha.contacto_idcontacto = contacto.idcontacto
AND fecha.responsable_idresponsable = responsable.idresponsable 
AND contacto.cliente_idcliente = cliente.idcliente
order by proyecto.idproyecto


/******************funciona**********************/
select fecha.registro, 
        cliente.nombre, 
        responsable.nombre, 
        proyecto.oportunidad, 
        contacto.nombre, 
        contacto.apellido,
        fecha.aceptacion,
        concat(fecha.oferta - curdate(), " dias restantes") AS estado
from fecha, cliente, responsable, proyecto, contacto
where fecha.proyecto_idproyecto = proyecto.idproyecto 
AND fecha.contacto_idcontacto = contacto.idcontacto
AND fecha.responsable_idresponsable = responsable.idresponsable 
AND contacto.cliente_idcliente = cliente.idcliente 
AND fecha.oferta - curdate() > -1
order by proyecto.idproyecto