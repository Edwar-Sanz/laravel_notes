en la carpeta resourses/lang/en se encuentran todos 
los mensajes de error, validacion, paginacion y passwords

para cambiar el idioma se puede cambiar la configuracion
desde  la carpeta config/app en la linea 'locale' => 'en',
o también usando la función setlocale
  App::setLocale("es")


se puede descargar algún paquete con el idioma deseado
y ponerlo en la carpeta de lenguaje por ejemplo:
para español quedaria así:
  resourses/lang/es
y config/app:
'locale' => 'es'

//-------------------------------------------
podemos configurar un es.json con traducciones globales
en la carpeta resourses/lang/
{
  "Home": "Inicio"
}

en el .blade se puede acceder al es.json de la siguiente forma:

  {{__("Home")}}
o tambien:
  @lang("Home")