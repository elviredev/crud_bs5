# ☑️ Projet Laravel 12 - Bootstrap 5 - CRUD students

- https://www.youtube.com/watch?v=Qz5OF9WwyOk&t=531s
- 5:59

## 👾 Setup

### 🚀 Laravel 12

- dans le dossier **laravel/herd**, ouvrir le terminal

```bash
laravel new crud_bs5
  >> none
  >> 0 // Pest
  >> mysql
  >> no // pour npm install
```


### 📦 Bootstrap 5 et PopperJS

```bash
npm i --save bootstrap @popperjs/core
```

### 📦 SASS
- installer SASS dans les dev dependances

```bash
npm i --save-dev sass
```

### ✅ Structure

- créer un dossier **resources/sass**
- créer un fichier **app.scss**

- importer bootstrap dans le fichier **app.scss**

```scss
@import 'bootstrap/scss/bootstrap';
```

- dans le fichier **js/app.js** importer les fonctionnalités javascript de bootstrap

```js
import * as bootstrap from 'bootstrap';
```

- créer un dossier **views/layouts** et à l'intérieur un fichier **app.blade.php**
- ajouter la directive `@vite()`
- ajouter la directive `@yield()` pour afficher le contenu de la page

```html
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta
    name="viewport"
    content="width=device-width, user-scalable=no,
    initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-dark">
  <div id="app">
    <main class="py-4">
      @yield('content')
    </main>
  </div>
</body>
</html>
```

- créer un fichier **resources/views/home.blade.php** juste pour tester le style bootstrap
- ajouter la directive `@extends()` pour spécifier le fichier de layout dont la vue enfant doit hériter
- ajouter la directive `@section()` incluant le contenu de la vue enfant

```php
@extends('layouts.app')

@section('content')
  <div class="alert alert-warning" role="alert">
    A simple warning alert-check it out!
  </div>
@endsection
```

### 🛣️ Route

- ajouter une route pour la vue **home**

**web.php** <br>

```php
Route::get('/home', function () {
  return view('home');
});
```

### 📚 BDD

**.env** <br>

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_bs5
DB_USERNAME=root
DB_PASSWORD=admin
```

- dans **phpmyadmin** créer une nouvelle bdd nommée **crud_bs5**
- dans le terminal, ouvrir le terminal et lancer la migration

```bash
php artisan migrate
```

- la bdd est migrée

### 💾 Lancer les serveurs

- compiler les ressources et demarrer le serveur de developpement

```bash
npm run dev
```

- comme on utiliser Herd, le serveur PHP est intégré et déja lancé donc pas besoin de lancer la commande `php artisan serve`
- URL : _http://crud_bs5.test/_

- maintenant, naviguer vers la page home pour check le style bootstrap: _http://crud_bs5.test/home_

- la page avec le style bootstrap s'affiche bien mais dans la console on voit que des erreurs sont apparues pour des règles SASS devenues obsolètes et qui seront supprimées. Pour résoudre ce problème, il faut rétrograder la version de SASS.

- arrêter le serveur de developpement Vite

```bash
npm i sass@1.77.6 --save-exact
npm run dev
```

- les erreurs ont disparu







































































