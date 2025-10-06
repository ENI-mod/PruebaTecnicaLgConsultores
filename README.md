# Resolucion de Preguntas

## GIT

1. Explica la diferencia entre git merge y git rebase.
- Git merge: Este nos permite combinar los cambios de una rama en otra, manteniendo el historial de ambas ramas.
- Git rebase: Este nos permite combinar los cambios de una rama en otra, moviendo el historial de la rama que se combina al final de la rama principal.

2. Explique que hace git pull y git fetch
- Git pull: Este nos permite obtener los cambios de un repositorio remoto y combinarlos con nuestro repositorio local.
- Git fetch: Este nos permite obtener los cambios de un repositorio remoto, pero no combinarlos con nuestro repositorio local.

3. ¿Qué significa un conflicto en Git y cómo lo resolverías?
- Un conflicto en Git ocurre cuando hay cambios en el mismo archivo en diferentes ramas y Git no puede determinar cuáles cambios mantener.
- Para resolver un conflicto, debemos resolver los cambios manualmente y marcarlos como resueltos con el comando git add.

## Seccion 1

1. ¿Cuál es la diferencia entre etiquetas semánticas y no semánticas en HTML?
- Etiquetas semánticas: Son etiquetas que tienen un significado semántico, es decir, que representan un elemento con un significado en el documento, por ejemplo <header> <footer> <nav> <article> <section>.
- Etiquetas no semánticas: Son etiquetas que no tienen un significado semántico, es decir, que representan un elemento sin significado en el documento, por ejemplo <div> <span>.

2. ¿Qué ventajas tiene usar Flexbox o Grid en CSS?
- Flexbox: Ideal para alinear elementos en una sola dimension, horizontal o vertical.
- Grid: Ideal para alinear elementos en dos dimensiones, horizontal y vertical.

3. ¿Cuál es la diferencia entre == y === en JavaScript?
- ==: Compara los valores, realizando una conversion si es necesario.
- ===: Compara los valores y los tipos de datos, sin realizar conversion.

4. Explica qué es el DOM y cómo lo manipularías con JS.
- DOM: Document Object Model, es una representacion en forma de arbol de los elementos del documento HTML.
- Con JS podemos leer, modificar y eliminar elementos del DOM, mediante diferentes selectores.

## Seccion 2

1. ¿Qué diferencia existe entre $_GET y $_POST?
- $_GET: Se utiliza para enviar datos por la URL, por lo que los datos son visibles en la URL.
- $_POST: Se utiliza para enviar datos por el cuerpo de la peticion, por lo que los datos no son visibles en la URL.

2. ¿Por qué es importante usar password_hash?
- Porque de este modo no se puede obtener la contraseña original, por lo que protegemos la contraseña del usuario en caso de que se filtre o se acceda directamente a la base de datos.