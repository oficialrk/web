<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincón del Malvado</title>
    <style>
        body {
            background-color: black;
            color: lime;
            font-family: 'Courier New', Courier, monospace;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header img {
            width: 200px;
            height: auto;
            border: 3px solid rgb(0, 0, 0);
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
        }

        section {
            flex-basis: 30%;
            padding: 20px;
            margin-bottom: 20px;
            background-color: rgba(0, 128, 0, 0.3);
            border: 2px solid lime;
            overflow-y: auto; /* Agregamos una barra de desplazamiento vertical si el contenido excede el tamaño del contenedor */
            max-height: 300px; /* Limitamos la altura máxima del chat para evitar que crezca indefinidamente */
        }

        section h2 {
            color: lime;
            text-align: center;
        }

        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 10px;
            resize: none;
        }

        button {
            padding: 10px 20px;
            background-color: lime;
            color: black;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: black;
            color: lime;
        }

        .mensaje {
            margin-bottom: 5px; /* Agregamos un pequeño espacio entre mensajes */
        }
    </style>
</head>
<body>
    <header>
        <h1>marki.exe</h1>
        <img src="move2.jpg" alt="Tu foto malvada">
    </header>
    <main>
        <section id="imagenes">
            <h2>exposeds</h2>
            <!-- Aquí puedes agregar un carrusel o galería de imágenes -->
        </section>
        <section id="chat">
            <h2>dark chat</h2>
            <div id="mensajes">
                <!-- Aquí se mostrarán los mensajes del chat -->
            </div>
            <textarea id="mensaje" placeholder="Escribe aquí tu mensaje o adjunta un archivo .py..."></textarea>
            <input type="file" id="archivo" accept=".py">
            <button onclick="enviarMensaje()">Enviar</button>
        </section>
        <section id="informacion">
            <h2>marki.exe ?</h2>
            <p>marki.exe el mejor developer ddos tools port scanner bot nets btc miner todo lo ilegal aqui lo vas a poder encontrar </p>
        </section>
    </main>

    <script>
        var contadorMensajes = {}; // Objeto para almacenar el contador de mensajes de cada usuario
        var usuariosEliminados = {}; // Objeto para almacenar el tiempo en que cada usuario fue eliminado

        function enviarMensaje() {
            var mensaje = document.getElementById("mensaje").value;
            var archivo = document.getElementById("archivo").files[0];
            var usuario = "Usuario"; // Puedes obtener el nombre de usuario de alguna manera si lo deseas
            var ahora = Date.now(); // Tiempo actual en milisegundos

            // Verificar si el usuario fue eliminado recientemente y si todavía está en tiempo de cooldown
            if (usuariosEliminados[usuario] && (ahora - usuariosEliminados[usuario]) < (60 * 1000)) {
                alert("Debes esperar 1 minuto antes de enviar otro mensaje.");
                return;
            }

            if (mensaje.trim() !== "" || archivo) {
                var mensajesDiv = document.getElementById("mensajes");
                var nuevoMensaje = document.createElement("div");
                nuevoMensaje.textContent = mensaje.trim() !== "" ? mensaje : "Archivo adjunto: " + archivo.name;
                nuevoMensaje.classList.add("mensaje"); // Agregamos una clase al nuevo mensaje para darle un estilo
                mensajesDiv.appendChild(nuevoMensaje);
                mensajesDiv.scrollTop = mensajesDiv.scrollHeight; // Hacemos que el chat se desplace automáticamente hacia abajo para mostrar el nuevo mensaje
                document.getElementById("mensaje").value = "";

                // Contar mensajes del usuario
                if (!contadorMensajes[usuario]) {
                    contadorMensajes[usuario] = 1;
                } else {
                    contadorMensajes[usuario]++;
                }

                // Verificar si el usuario ha enviado más de 5 mensajes iguales y eliminarlo si es así
                if (contadorMensajes[usuario] > 5) {
                    mensajesDiv.innerHTML = ""; // Eliminar todos los mensajes del chat
                    mensajesDiv.textContent = "¡El usuario " + usuario + " ha sido eliminado por enviar spam!";
                    contadorMensajes[usuario] = 0; // Reiniciar el contador de mensajes del usuario
                    usuariosEliminados[usuario] = ahora; // Registrar el tiempo en que el usuario fue eliminado
                }
            }
        }
    </script>
</body>
</html>
