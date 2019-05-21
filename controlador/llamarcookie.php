<!DOCTYPE html>
<html lang="es">
<body onload="carga()">
        <h1>
            <?php
                if(isset ($_COOKIE["tiempoBloqueado"])){//Si la variable esta declarada lacookie esta activada
                    echo "La cookie de bloqueo fue creada: " ."<br>";
                    echo $_COOKIE["tiempoBloqueado"] . "<br>";
                    echo "Contiene el ID del participante bloqueado";
                    ?>
                        <script>
                            function carga(){
                                Segundos =60;
                                Minutos= 60;
                                Horas= 0;
                                s = document.getElementById("segundos");
                                m = document.getElementById("minutos");
                                h = document.getElementById("horas");
                                cronometro = setInterval(function(){//inicia automaticamente un contador, en este caso se esta indicando un contador regresivo
                                            Segundos--;
                                            if(Segundos==0){
                                                Segundos=60;
                                                Minutos--;
                                            }
                                        s.innerHTML = Segundos;
                                        m.innerHTML = Minutos;

                                            Minutos
                                            if(Minutos==0){
                                                Minutos=60;
                                                Horas--;
                                            }
                                        h.innerHTML = Horas;
                                }, 1000);
                            }
                        </script>
                    <?php
                } 
                else{
                    echo " La cookie de tiempo de bloqueo expiro. " ;
                }
            ?>
        </h1>
</body>
</html>
    <span id="horas">6</span>:<span id="minutos">60</span>:<span id="segundos">2</span>




