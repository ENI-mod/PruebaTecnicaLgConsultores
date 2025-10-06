# Análisis de Productos y Consultas SQL

Este proyecto contiene scripts SQL y Python para el análisis de datos de productos y usuarios.

## Estructura del Proyecto

```
.
├── python/
│   ├── analisis.py           # Script de análisis de productos
│   └── productos_1000.csv    # Archivo de datos de productos
└── sql/
    └── script_1.sql         # Consultas SQL para análisis de usuarios
```

## Scripts SQL

### `script_1.sql`
Consultas para el análisis de usuarios:

1. **Consulta de usuarios recientes**:
   ```sql
   SELECT id, nombre, correo, fecha_nacimiento, fecha_registro
   FROM USUARIOS
   WHERE fecha_registro >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
     AND fecha_registro <= NOW()
   ORDER BY fecha_registro DESC;
   ```
   - Obtiene los usuarios registrados en los últimos 30 días.
   - Muestra información como ID, nombre, correo, fecha de nacimiento y fecha de registro.
   - Ordena los resultados por fecha de registro (más recientes primero).

2. **Conteo de usuarios con correo @gmail.com**:
   ```sql
   SELECT COUNT(*) AS total_usuarios_gmail
   FROM USUARIOS
   WHERE correo LIKE '%@gmail.com';
   ```
   - Cuenta cuántos usuarios tienen una dirección de correo de Gmail.

3. **Actualización de nombre de usuario**:
   ```sql
   UPDATE USUARIOS
   SET nombre = 'Nuevo Nombre'
   WHERE id = 10;
   ```
   - Actualiza el nombre del usuario con ID 10.

4. **Eliminación de usuario**:
   ```sql
   DELETE FROM USUARIOS
   WHERE id = 15;
   ```
   - Elimina el usuario con ID 15 de la base de datos.

## Scripts Python

### `analisis.py`

Script para analizar datos de productos desde un archivo CSV.

#### Características:
- Lee un archivo CSV con información de productos (nombre, precio, stock).
- Calcula métricas clave:
  - Promedio de precios de todos los productos.
  - Producto con mayor stock disponible.
  - Total de productos en el catálogo.
- Manejo de errores para archivos faltantes o con formato incorrecto.

#### Requisitos:
- Python 3.x
- Bibliotecas: pandas

#### Instalación de dependencias:
```bash
pip install pandas
```

#### Uso:
1. Colocar el archivo `productos_1000.csv` en la misma carpeta que `analisis.py`.
2. Ejecutar el script:
   ```bash
   python analisis.py
   ```

#### Salida de ejemplo:
```
Analizando archivo: /ruta/al/archivo/productos_1000.csv

--- Análisis de Productos ---
1. Promedio de precios: $1,024.12

2. Producto con mayor stock:
   Nombre: Producto_823
   Precio: $900.05
   Stock: 500 unidades

3. Total de productos: 1,000
```

## Notas Adicionales
- Asegúrate de que los archivos CSV tengan las columnas correctas.
- Se recomienda hacer una copia de seguridad de la base de datos antes de ejecutar consultas de actualización o eliminación.
- Para grandes volúmenes de datos, considera optimizar las consultas SQL con índices apropiados.