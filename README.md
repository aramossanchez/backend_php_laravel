# Backend PHP Laravel

## Solicitan desde GeeksHubs Academy realizar una aplicación para una empresa. El objetivo es que permita que los empleados puedan contactar con otros compañeros para formar grupos para jugar a un videojuego, con el objetivo de poder compartir un rato de ocio afterwork.

## Los requisitos funcionales de la aplicación son los siguientes:
* Los usuarios se tienen que poder registrar a la aplicación, estableciendo un usuario/contraseña.
* Los usuarios tienen que autenticarse a la aplicación haciendo login.
* Los usuarios tienen que poder crear Parties (grupos) por un determinado videojuego.
* Los usuarios tienen que poder buscar Parties seleccionando un videojuego.
* Los usuarios pueden entrar y salir de una Party.
* Los usuarios tienen que poder enviar mensajes a la Party. Estos mensajes tienen que poder ser editados y borrados por su usuario creador.
* Los mensajes que existan en una Party se tienen que visualizar como un chat común.
* Los usuarios pueden introducir y modificar sus datos de perfil, por ejemplo, su usuario de Steam.
* Los usuarios tienen que poder hacer logout de la aplicación web.

## BASE DE DATOS Y SUS RELACIONES

***
![Base de datos y sus relaciones](./proyecto_backend/app/Images/screenshot1.jpg)
***

* Player tiene una relación con **party de 1:N** (una party solo tiene un player creador, y un player puede ser creador de 0, 1 o varias parties).
* Player tiene una relación con **party de N:N**, creando la tabla **member** (una party puede tener 1 o varios players como miembros, y un player puede pertenecer a 0, 1 o varias parties).
* Player tiene una relacion con **player de N:N**, creando la tabla **friendship** (un player puede ser amigo de 0, 1 o varios players).
* Player tiene una relación con **message de 1:N** (un message solo puede tener un player creador, y un player puede tener 0, 1 o varios messages).
* Message tiene una relación con **party de 1:N** (una party puede tener 0, 1 o varios messages, y un message solo puede tener una party).
* Party tiene una relación con **game de 1:N** (una party solo puede tener un game, y un game puede tener 0, 1 o varias parties).


## ENDPOINTS DE LA API
* PLAYER
    * Ver todos los players -->
    * Crear player nuevo -->
    * Editar player ya existente -->
    * Borrar player ya existente -->
    * Login en la aplicación --> 
    * Logout de la aplicación -->

* GAME
    * Ver todos los games --> 
    * Crear game nuevo --> 
    * Editar game ya existente --> 
    * Borrar game ya existente --> 

* PARTY
    * Ver todas las parties --> 
    * Crear party nueva --> 
    * Editar party ya existente --> 
    * Borrar party ya existente --> 
    * Buscar party por game --> 

* MESSAGE
    * Ver todos los messages --> 
    * Crear message nuevo --> 
    * Editar message ya existente --> 
    * Borrar message ya existente --> 
    * Buscar messages por party --> 

* MEMBER
    * Ver todos los members --> 
    * Crear member nuevo --> 
    * Editar member ya existente --> 
    * Borrar member ya existente --> 

* FRIENDSHIP
    * Ver todos los friendships --> 
    * Crear friendship nuevo --> 
    * Editar friendship ya existente --> 
    * Borrar friendship ya existente --> 