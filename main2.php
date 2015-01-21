<?php
/* Esquema general:
LeerCategorias(usuarioActivo)
mostrarCategorias(usuarioActivo)
si (Categoria(seleccionada)) entonces
	LeerEnlaces(Categoria)
	mostrarEnlaces(Categoria)
fsi
si(enlace.editar) entonces
	leerModificacion(enlace)
	comprobarModificacion(enlace)
	enviarModificacion(enlace)
	infoResultadoModificacion(enlace)
fsi
si(editar(categoria)) entonces
	leerModificacion(categoria)
	comprobarModificacion(categoria)
	enviarModificacion(categoria)
	infoResultadosModificacion(categoria)
fsi

Campos que se necesitan:

para mostrar Categorias:
	IDCategory (para luego poder modificar categorías)
	CATName
para mostrar enlaces:
	IDLink (para luego poder modificar enlaces)
	LinkName
	URL

ARRAY DE DATOS

opción 1: Array multidimensional

Array multidimensional:
	-Categoria
		-Enlaces

opción 2: Dos Arrays

	-Array Categoria
	-Array Enlaces

Cuando se haga submit de cualquier modificación, deberán recargarse los arrays desde las base de datos.


¿Cómo cargar los arrays?

opción 1: 1 SELECT, no sé cómo hacerlo...


opción 2: 2 SELECTs, una para cada array.
*/
?>