const express = require('express');
const cors = require('cors');
const { connectDB } = require('./data/config.js'); // Importar la función de conexión
const app = express();
const port = 3002;

const routes = require('./routes/routes'); // Asegúrate de que esta ruta sea correcta

app.use(express.json()); // Middleware para JSON
app.use(cors()); // Usa el middleware cors

// Usa las rutas que están en routes.js
routes(app);

// Conectar a la base de datos y luego iniciar el servidor
connectDB().then(() => {
    app.listen(port, () => {
        console.log(`El servidor escucha en el puerto ${port}`);
    });
}).catch(err => {
    console.error('No se pudo iniciar el servidor debido a un error de base de datos:', err);
    process.exit(1); // Salir si no se puede conectar a la BD
});