# MENU
Librerías de navegación

- [Instalar menú](#instalacion)
- [Guardar menú](#save)
- [Buscar menú](#query)
- [Actualizar menú](#update)
- [Interactuando con la sesiones](#auth)
- [Agregar menú a la vista](#view)

### Instalación
Descargar vía [Composer](http://getcomposer.org/).

```
    composer require linaresdev/navy
```

Inicializar desde el proveedor de servicio

```
    ## ServiceProvider
    \Malla\Menu\Provider\MenuServiceProvider::class

    ## Facade
    "Nav" => \Malla\Menu\Faade\Nav::class,
```

Guardar menú etiquetado desde un arreglo

```php
    Nav::save([
        "tag"           => "users-nav-profile",
        "route"         => "profiler*",
        "description"   => "Public Nav 0",
        "skin"          => \Malla\Template\BS5::class,
        "filters"       => [],
        "items"         => [],
    ]);
```
Guardar menú etiquetado desde una clase

```php
    Nav::save(new \Malla\Admin\UserNav);

    // OR
    Nav::save(\Malla\Admin\UserNav::class);
```

Guardar menú etiquetado desde un closure

```php
    Nav::save(function($nav) {

        $nav->add("tag", "users-profile");
        $nav->add("route", "admin/users*");
        $nav->add("description", "Area nav 0");

        $nav->addFilters("style", [
            ":node0" => "nav flex-column"
        ]);

        $nav->addItem([
            "icon"   => "mdi mdi-account",
            "label"  => "words.users",
            "url"    => "profiler/usrID"
        ]);
    });
```

### QUERY

Buscar menú etiquetado

```php
    Nav::whereTag($tag="users-nav-profile", function($nav) {
        //
    });
```

Buscar route menú registrado

```php
    Nav::whereRoute($route="admin/users*", function($nav) {
        //
    });
```

### AUTH
Interactuando con la sesiones

Bloquear un ítem de un menú si no esta logueado.

```php

    Nav::whereRoute("admin/users*", function($nav) {

        ## Restringir un item demenu por su indice
        $nav->rejectItem(2);
    });

```

### UPDATE
Actualizar un item de menú conociendo su indice

```php

    Nav::whereRoute("admin/users*", function($nav){
        ## Agregar un nuevo item
        $nav->addItem($itemData=[]);

        ## Actualizar un item
        $nav->updateItem($index=0, $itemData=[]);

        
    });
```

### VIEWS
Agregar un menú etiquetado a la vista

```php

    {!! Nav::tag($tag="users-nav-profile", $ident=12) !!}
```
Agregar un route menú a la vista
```php

    {!! Nav::route($route="admin/users", $ident=12) !!}
```