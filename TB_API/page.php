<?php 
include("Class.php");
if (isset($_POST['acao'])) {
  
              $saida = $_POST['saida'];
              $destino = $_POST['destino'];
              
              $saida = str_replace(' ', '+',$saida);    
              $destino = str_replace(' ', '+',$destino);  

              $file = file_get_contents('https://maps.googleapis.com/maps/api/directions/json?origin='.$saida.'&destination='.$destino.'&key=AIzaSyBd3JsFG29zvgr-lZUmHTt-N-7hatLy4PY&callback=initMap&libraries=&v=weekly');

              $teste = json_decode($file);


              $novo = $teste->routes[0];

              $novo2 = $novo->bounds;

              $lat_start = $novo2->northeast->lat;

              $long_start = $novo2->northeast->lng;

              $lat_end = $novo2->southwest->lat;

              $long_end = $novo2->southwest->lng;


              $g = new Conn;

              if ($g->conectar() == true) {
              $g->Salvar($saida, $destino, $lat_start, $long_start, $lat_end, $long_end);
              header("Location:index.php");
              }

            }
                      
?>