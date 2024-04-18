<?php
namespace Malla\Locales;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class es_DO {
   public function header() {
      return [
         "slug"         => "es",
         "name"         => "es_DO",
         "description"  => "Español República Dominicana"
      ];
   }

   public function lines() {
      return [
         
         // "auth.register"   => "Registrarme",
         // "auth.remember"   => "Recordar acceso",
         // "auth.retrieve"    => "Recuperar cuenta",
         // "auth.password"   => "Contraseña de acceso",

         "account.domain"        => "Dominio de la cuenta",
         "admin.account"         => "Administrar cuenta",
         "admin.access"          => "Administrar accesos",

         "auth.0"                => "Cuenta deshabilitada",
         "auth.2"                => "Cuenta suspendida de forma temporal",
         "auth.3"                => "Cuenta bloqueada",
         "auth.login"            => "Acceder",
         "auth.bad"              => "Credenciales incorrectas",

         "auth.getmembership"    => "Solicitar membresía",

         "auth.required"         => "Identificate porfavor",
         "auth.update.abrupt"    => "Intentó modificar datos a fuerza bruta",  
         "auth.rol.deny"         => "No cuenta no posee los permisos requeridos para esta operacion",

         "auth.start"            => "Inicio de sesión",
         "auth.close"            => "Cierre de sesión",

         "domain.name"           => "Nombre de dominio",

         "email.account"         => "Correo de la cuenta",

         "membership.cancel"           => "Cancelar membresía",
         "membership.request"          => "Solicitud de membresía",
         "membership.start"            => "Acectar y finalizar",
         "getmembership.mail.info"     => "Recibimos su solicitud y realizamos lo preparativo para acompañarlos durante el proceso.",
         "getmembership.mail.action"   => "En el siguiente link completara su membresía de forma segura.",
         "getmembership.mail.footer"   => 'Esta cuenta solo permite correos salientes, los correos entrantes 
         no son revisados. Si desea comunicarse con nuestro equipo hágalo por la vía correspondiente, o acceda a',
         
         
         "new.password"          => "Nueva contraseña",
         "new.rpassword"         => "Confirmar nueva contraseña",

         "public.name"           => "Nombre público",

         "register.error"        => "Error al tratar de realizar el registro",
         "register.successfull"  => "Registro realizado correctamente",
         "retrypass.request"     => "Solicitaste recuperar su contraseña",
         "retrypass.message"     => "En el siguiente link podrás acceder y actualizar tu contraseña.",

         "request.update.password" => "Solicitar cambio de contraseña",

         "update.account"        => "Actulizar cuenta",
         "update.credential"     => "Actualizar credenciales",
         "update.domain"         => "Actulizar nombre de dominio",
         "update.password"       => "Actualizar contraseña",
         "update.successfull"    => "Actualización realizada correctamente",        

         "user.account"          => "Cuenta del usuario",
         "user.form"             => "Formulario de usuarios",

         "user.groups"           => "Grupos de usuarios",
         "user.register"         => "Registrar usuario",

         "user.state.0"          => "Inactivo|Inactivar",
         "user.state.1"          => "Activo|Activar",
         "user.state.2"          => "Suspendido|Suspender",
         "user.state.3"          => "Bloqueado|Bloquear",
         "user.state.4"          => "Legales",
         "user.state.5"          => "Eliminado",

         "request.password"        => "Solicitar contraseña",
         "request.update.password" => "Solicitar actulizar contraseña",        

         "words.add"             => "Agregar",
         "words.actions"         => "Acciones",
         "words.account"         => "Cuentas",
         "words.access"          => "Acceder",
         "words.administrator"   => "Administración",
         "words.all"             => "Todo",
         "words.applications"    => "Aplicaciones",
         "words.configs"         => "Configuración",
         "words.contacts"        => "Contactos",
         "words.components"      => "Componentes",
         "words.cellphone"       => "Teléfono celular",
         "words.close"           => "Cerrar",
         "words.credential"      => "Credenciales",
         'words.dashboard'       => "Escritorio de trabajo",
         "words.domain"          => "Dominio",
         "words.description"     => "Descripción",
         'words.domain'          => "Dominio",
         "words.email"           => "Correo Electrónico",
         "words.home"            => "Inicio",
         "words.firstname"       => "Nombre",
         "words.filter"          => "Filtrar",
         "words.form"            => "Formulario",
         "words.fullname"        => "Nombre completo",
         "words.getmembership"   => "Solicitar membresía",
         "words.groups"          => "Gupos",
         "words.helpme"          => "Ayudame",
         "words.lastname"        => "Apellidos",
         "words.login"           => "Acceso",
         "words.logout"          => "Salir",
         "words.password"        => "Contraseña",
         "words.profiler"        => "Credenciales del usuario",
         "words.pwd"             => "Contraseña",
         "words.rpwd"            => "Confirmar contraseña",
         "words.rnc"             => "Número de registro del contribuyente",
         "words.retrieve"        => "Recuperar",
         "words.register"        => "Registro",
         "words.register-me"     => "Registrarme",
         "words.remember"        => "Recuerda",
         "words.message"         => "Mensaje",
         "words.modules"         => "Módulos",
         "words.name"            => "Nombre",
         "words.bell"            => "Notificaciones",
         "words.user"            => "Usuario",
         "words.users"           => "Usuarios",
         "words.save"            => "Guardar",
         "words.send"            => "Enviar",
         "words.slower"          => "Mas lento",
         "words.settings"        => "Ajustes",
         "words.subject"         => "Asunto",
         'words.system'          => "Sistema",
         "words.state"           => "Estado",
         "words.write-to-us"     => "Excribenos",

         "validator.email"       => "El campo :attribute no es valido",
         "validator.unique"      => "El :attribute no esta disponible",
         "validator.required"    => "El campo :attribute es requerido",
         "validator.min"         => "El campo :attribute solo permite minimo :min caracteres",
         "validator.same"        => "Los campos no coinciden",

         "send.update.password"  => "Enviar solicitud cambio de contraseña",
         "send.temporary.access" => "Enviar acceso temporal",

         "schedule.update.password" => "Progamar actualización de contraseña",
      ];
   }
}