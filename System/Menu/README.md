# MENU
Librerías de navegación

- [Instalar menú](#instalacion)
- [Guardar menú](#save)
- [Buscar menú](#query)
- [Actualizar menú](#update)
- [Interactuando con la sesiones](#auth)
- [Agregar menú a la vista](#views)

### Instalación
Descargar vía [Composer](http://getcomposer.org/).

```
    composer require linaresdev/menu
```

Inicializar desde el proveedor de servicio

```
    ## ServiceProvider
    \Malla\Menu\Provider\MenuServiceProvider::class

    ## Facade
    "Nav" => \Malla\Menu\Faade\Nav::class,
```

### SAVE

Guardar menú etiquetado desde un arreglo

```php
    Nav::save([
        "tag"           => "users-nav-profile",
        "route"         => "profiler*",
        "description"   => "Public Nav 0",
        "template"      => "bootstrap",
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
        ## HEADER
        $nav->add("tag", "users-profile");
        $nav->add("route", "admin/users*");
        $nav->add("description", "Area nav 0");

        ## FILTROS DE ESTILOS
        $nav->styleFilter([
            ":node0" => "nav flex-column"
        ]);

        ## FILTROS DE LOS TEXTOS O ETIQUETAS
        $nav->labelFilter("match", [   
            "{username}" => 'Ramon Anulfo Linares'         
        ]);
        $nav->labelFilter("dress", [   
            "{username}" => '<span class="text-toggle">{username}</span>'         
        ]); 

        ## AGREGAR UN HEADER
        $nav->addItem(0, function($item) {
            $item->add("type", "text");
            $item->add("label", "Title menu");
        });

        ## AGREAR UNA LINEA
        $nav->addItem(1, function($item) {
            $item->add("type", "line");
        });

        ## AGREAGAR UN LINK SIMPLE AL MENU
        ## $nav->addItem($key, $closure);
        ## $key es ek numero de posicion del item 
        ## Closure es el constructor

        $nav->addItem(2, function($item) {
            $item->add("type", "link");
            $item->add("icon", "mdi-account");
            $item->add("label", "update.password");
            $item->add("url", "profiler/{usrID}/update/password");
        });

        ## AGREAGAR UN LINK DROPDOWN
        $nav->addItem(3, function($item) {
            $item->add("type", "link");
            $item->add("icon", "mdi-account");
            $item->add("label", "update.password");
            $item->add("url", "profiler/{usrID}/update/password");

            $item->addDropdown(0, function($item){
                $item->add("type", "link");
                $item->add("icon", "mdi-bell");
                $item->add("label", "words.blog");
                $item->add("url", "blog");
            });
        });

    });
```

### QUERY

Consulta menú etiquetado

```php
    Nav::tag($tag="users-nav-profile", function($nav) {
        //
    });
```

Buscar route menú registrado

```php
    Nav::route($route="admin/users*", function($nav) {
        //
    });
```

### AUTH
Interactuando con la sesiones.
Bloquear un ítem de un menú si no esta logueado.

```php

    Nav::tag("admin-users", function($nav) {
        $nav->item($key=3, function($item) {
            ## Denegar link
            $nav->locked();

            ## Bloquear sub link
            $nav->locked(5);
        })
    });

    Nav::route("admin/users*", function($nav) {
        
        $nav->item($key=3, function($item) {
            ## Denegar link
            $nav->locked();

            ## Bloquear sub link
            $nav->locked(5);
        });
    });

```

### UPDATE
Actualizar un item de menú conociendo su indice

```php
    Nav::tag("admin-users", function($nav) {
        $nav->item($key=3, function($item) {
            ## Denegar link
            $nav->update($data=[]);

            ## Bloquear sub link
            $nav->update($key=5, $data=[]);
        });      
    });

    Nav::route("admin/users*", function($nav) {
        $nav->item($key=3, function($item) {
            ## Denegar link
            $nav->update($data=[]);

            ## Bloquear sub link
            $nav->update($key=5, $data=[]);
        });      
    });
```

### VIEWS
Agregar un menú etiquetado a la vista

```php

    {!! Nav::tag($tag="users-nav-profile", $ident=12) !!}
```
Agregar un route menú a la vista
```php

    {!! Nav::route( $ident=12 ) !!}
```