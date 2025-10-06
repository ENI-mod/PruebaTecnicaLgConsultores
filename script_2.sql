SELECT 
    COUNT(*) AS total_usuarios_gmail
FROM 
    USUARIOS
WHERE 
    correo LIKE '%@gmail.com';