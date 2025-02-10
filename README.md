Crear una Rama:

Abre tu terminal -> 
cd ruta/a/tu/repositorio

Asegúrate de estar en la rama principal -> 
git checkout main

Actualiza tu rama principal -> 
git pull origin main

Crea y cambia a la nueva rama -> 
git checkout -b nombre-de-tu-rama

Sube la nueva rama a GitHub ->
git push -u origin nombre-de-tu-rama

Para realizar un cambio en el proyecto

git status -> podes ver donde hiciste los cambios

git add -> agregas esos cambios

git commit -m "Agregas descripción de los cambios"

git push -> subis el commit con los cambios realizados

Si hay problemas para hacer el pull

Seguir los siguientes pasos: 

git checkout main

git pull origin main

git merge mi-rama

git push origin main
