<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <v-app id="inspire">
        <v-navigation-drawer
            v-model="drawerRight"
            fixed
            right
            app
        >
            <v-list dense class="ma-4">
                <v-list-tile @click.stop="right = !right" class="mb-2">
                    <v-list-tile-action>
                        <v-icon>settings</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Configuración</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile @click.stop="logout">
                    <v-list-tile-action>
                        <v-icon>exit_to_app</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Cerrar Sesión</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <v-toolbar
            color="blue-grey"
            dark
            fixed
            app
        >
            <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title>{{ config('app.name', 'Laravel') }}</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-side-icon @click.stop="drawerRight = !drawerRight"></v-toolbar-side-icon>
        </v-toolbar>
        <v-navigation-drawer
            v-model="drawer"
            fixed
            app
        >
            <v-list dense class="ma-4">
                <v-list-tile @click.stop="left = !left" class="mb-2">
                    <v-list-tile-action>
                        <v-icon>pets</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Animales</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile @click.stop="left = !left">
                    <v-list-tile-action>
                        <v-icon>place</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Sitios</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <v-navigation-drawer
            v-model="left"
            temporary
            fixed
        ></v-navigation-drawer>
        <v-content>
            @yield('content')
        </v-content>
        <v-navigation-drawer
            v-model="right"
            right
            temporary
            fixed
        ></v-navigation-drawer>
        <v-footer color="blue-grey" class="white--text pa-3" app>
            <span>{{ config('app.name', 'Laravel') }}</span>
            <v-spacer></v-spacer>
            <span>&copy; 2019</span>
        </v-footer>
    </v-app>
</div>
</body>
</html>
