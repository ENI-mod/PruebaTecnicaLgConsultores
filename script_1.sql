SELECT 
    id,
    nombre,
    correo,
    fecha_nacimiento,
    fecha_registro
FROM 
    USUARIOS
WHERE 
    fecha_registro >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
    AND fecha_registro <= NOW()
ORDER BY 
    fecha_registro DESC;