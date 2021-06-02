<!DOCTYPE html>
<html>
  <head>
    <title>Directions Service</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="scripts,js"></script>
  </head>
  <body class="bg-dark light">
    <div id="map"></div>

    <div class="container">
      <div class="row">
              <form method="post" action="page.php">
                <div class="col-md-3">
                  <label for="start" class="form-label">Saída</label>
                  <input type="text" name="saida" class="form-control" id="start">
                  <div id="emailHelp" class="form-text">...</div>
                </div>
                <div class="col-md-3">
                  <label for="end" class="form-label">Destino</label>
                  <input type="text" name="destino" class="form-control" id="end">
                </div>
                <button type="submit" name="acao" class="btn btn-primary">Deseja Salvar os Dados?</button>
              </form>
      </div>
    </div>

 


    <script>
 
        function initMap() {
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 7,
          center: { lat: -6.0702749, lng: -49.8948304 },
        });
        directionsRenderer.setMap(map);

        const onChangeHandler = function () {
          calculateAndDisplayRoute(directionsService, directionsRenderer);
        };
        document
          .getElementById("start")
          .addEventListener("change", onChangeHandler);
        document
          .getElementById("end")
          .addEventListener("change", onChangeHandler);
        }

        function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        directionsService.route(
        {
            origin: {
            query: document.getElementById("start").value+'brazil',
            },
            destination: {
            query: document.getElementById("end").value+'brazil',
            },
            travelMode: google.maps.TravelMode.DRIVING,
        },
        (response, status) => {
            if (status === "OK") {
            directionsRenderer.setDirections(response);
            } else {
            // window.alert("Directions request failed due to " + status);
            }
        }
        );
          }

 
    </script>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=CHAVE-API&callback=initMap&libraries=&v=weekly&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>
