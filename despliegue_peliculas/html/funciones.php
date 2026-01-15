<?php

    function finduser(PDO $con,$user):array|false{
        try {
            $stm = $con->prepare('select * from usuario where username = :user');

            $stm->bindValue(':user',$user);

            $stm->execute();

            return $stm->fetch();
        } catch (PDOException $e) {
            echo "Error de conexion".$e->getMessage();
            return false;
        }
    };

    function findallseries(PDO $con,):array{
        try {
            $stm = $con->prepare('select s.id, s.titulo, s.fecha_publi, p.nombre,s.id_plat from serie s join plataforma p on  s.id_plat=p.id');

            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    };



    function findallfavoritos(PDO $con,$usuario):array{
        try {
            $stm = $con->prepare('select s.titulo, s.id, f.puntuacion, f.comentario, f.fecha from favorito f join serie s on f.id_serie=s.id  where f.id_usuario= :id_usuario');

            $stm->bindValue(':id_usuario',$usuario);
            $stm->execute();

            return $stm->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }

    }





    function findnofavseries(PDO $con,$id):array{
        try {
            $stm = $con->prepare('select id,titulo from serie where id not in(select id_serie from favorito where id_usuario = :user)');

            $stm->bindValue(':user',$id);
            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    };


     function findplat(PDO $con):array{
        try {
            $stm = $con->prepare('select id,nombre from plataforma');

            $stm->execute();

            return $stm->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    };








    function insertseries(PDO $con,$titulo,$plataforma,$fecha):bool{
        try {
            $stm = $con->prepare('insert into serie(titulo,id_plat,fecha_publi) values(:titulo,:plat,:fecha)');

            $stm->bindValue(':titulo',$titulo);
            $stm->bindValue(':plat',$plataforma);
            $stm->bindValue(':fecha',$fecha);

            $stm->execute();
            return $stm->rowCount() === 1;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    };


function updateseries(PDO $con,$id,$titulo,$plataforma,$fecha):bool{
        try {
            $stm = $con->prepare('update serie set titulo = :titulo, id_plat = :plat, fecha_publi = :fecha where id=:id');

             $stm->bindValue(':id',$id);
            $stm->bindValue(':titulo',$titulo);
            $stm->bindValue(':plat',$plataforma);
            $stm->bindValue(':fecha',$fecha);

            $stm->execute();
            return $stm->rowCount() === 1;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    };

    function delseries(PDO $con,$titulo):bool{
        try {
            $stm = $con->prepare('delete from serie where titulo=:titulo');

             $stm->bindValue(':titulo',$titulo);

            $stm->execute();
            return $stm->rowCount() === 1;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function delfav(PDO $con,$serie,$id_usuario):bool{
        try {
            $stm = $con->prepare('delete from favorito where id_serie=:id AND id_usuario = :id_user');

            $stm->bindValue(':id_user', $id_usuario);
            $stm->bindValue(':id', $serie);
            $stm->execute();

            return $stm->rowCount() === 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    function insertfav(PDO $con,$usuario,$serie,$puntuacion,$comentario):bool{
        try {
        $stm = $con->prepare('insert into favorito(id_usuario,id_serie,puntuacion,comentario) values(:usuario,:serie,:puntuacion,:comentario)');

        $stm->bindValue(':usuario',$usuario);
        $stm->bindValue(':serie',$serie);
        $stm->bindValue(':puntuacion',$puntuacion);
        $stm->bindValue(':comentario',$comentario);

        $stm->execute();

        return $stm->rowCount() === 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    function updatefav(PDO $con,$puntuacion,$comentario,$serie,$id):bool{
        try {
            $stm = $con->prepare('update favorito set puntuacion = :punt, comentario = :coment where id_usuario=:id and id_serie= :serie');

            $stm->bindValue(':id',$id);
            $stm->bindValue(':punt',$puntuacion);
            $stm->bindValue(':coment',$comentario);
            $stm->bindValue(':serie',$serie);
            
            

            $stm->execute();
            return $stm->rowCount() === 1;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    };
    

    function insertuser(PDO $con,$user,$pass,$name):bool{
        try {
            $stm = $con->prepare('insert into usuario(username,password,full_name) values(:user, :pass, :name)');
           $pass_segura = password_hash($pass,PASSWORD_DEFAULT);

           $stm->bindValue(':user',$user);
            $stm->bindValue(':pass',$pass_segura);
             $stm->bindValue(':name',$name);

             $stm->execute();

             return $stm->rowCount() === 1;

        } catch (PDOException $e) {
             echo $e->getMessage();
            return false;
        }
    }
    

    //Para que no puedas añadir 2 series con el mismo titulo
    function existeTitulo(PDO $con, $titulo): bool {
    try {
        $stm = $con->prepare('SELECT * FROM serie WHERE titulo = :titulo');
        $stm->bindValue(':titulo', $titulo);
        $stm->execute();
        
        
        return $stm->fetch() !== false;
    } catch (PDOException $e) {
        return false;
    }
}
