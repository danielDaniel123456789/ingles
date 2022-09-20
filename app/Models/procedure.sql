
DELIMITER ;;
   create procedure sp_buscarPalabra (in numero_usuario int, in categoria_id int)
   begin
 
     set @id_ultimaPalabraAprendida= (select vocabulario_id from aprendidas r 
       		where r.user_id=numero_usuario  order by r.id desc limit 1)+1;

   select *from vervos as v inner join historial_vervos as h
     where v.id=h.id_vervo
     

     


     and vocabularios.categoria_id=categoria_id;
   END;;




SELECT vervos.espayol
FROM vervos
 JOIN historial_vervos
where vervos.id = historial_vervos.id_vervo;


SELECT vervos.espayol
FROM vervos
RIGHT JOIN historial_vervos
ON vervos.id = historial_vervos.id_vervo;



