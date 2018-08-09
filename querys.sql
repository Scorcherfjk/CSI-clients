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


/******************funciona**********************/
SELECT fecha.registro as registro ,
        cliente.nombre as cliente ,
        responsable.iniciales as iniciales,
        proyecto.oportunidad as oportunidad ,
        contacto.nombre as cnombre ,
        contacto.apellido as capellido ,
        fecha.aceptacion as aceptacion ,
        fecha.visita as visita ,
        fecha.consultas as consultas ,
        fecha.respuestas as respuestas ,
        fecha.oferta as oferta ,
        fecha.decision as decision ,
        proyecto.enviado as enviado ,
        proyecto.cotizacion as cotizacion ,
        concat(fecha.oferta - curdate(), ' dias restantes') as estado,
        proyecto.comentario as comentario
FROM fecha, cliente, responsable, proyecto, contacto
WHERE fecha.proyecto_idproyecto = proyecto.idproyecto 
AND fecha.contacto_idcontacto = contacto.idcontacto
AND fecha.responsable_idresponsable = responsable.idresponsable 
AND contacto.cliente_idcliente = cliente.idcliente 
ORDER BY proyecto.idproyecto