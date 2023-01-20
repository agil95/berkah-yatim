
## About Berkah Anak Yatim

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

## Frontend Development
Recommended stacks:
- NPM as package runner
- Webpack (laravel mix)
- SASS
- Browsersync (don't push F5 too often, browsersync will handle it for you)

### NPM
To compile assets in development mode:
```js
$ npm run dev

or 

$ npm run development
```

To compile and watch for every changes:
```js
$ npm run watch
```

To compile production ready assets:
```js
$ npm run production

or

$npm run prod
```
`NOTE`: Do `npm run prod` also before create a PR to make sure production code refers to minified and bundled assets (it would be nice if CI/CD handled this automatically, so we don't have to store compiled assets in git)


### Webpack (laravel mix)
Webpack is a package bundler, it can make our asset size smaller. Laravel supports webpack by using mix. The configuration is pretty simple, located inside `webpack.min.js` file:

```js
mix.js('resources/js/app.js', 'public/js') // this will output app.js located under public/js
   .js('resources/js/proker.js', 'public/js') // output: /public/js/proker.js
   .sass('resources/sass/app.scss', 'public/css') // output: /public/css/app.css
   .sass('resources/sass/proker.scss', 'public/css') // output: /public/css/proker.css
```

### SASS
SASS is a pre-processor CSS, it enables some functionalities to your CSS, like variables, nesting, mixins, etc. You can read full the documentation [here](https://sass-lang.com/documentation).

### Browsersync
Browsersync will auto-sync our browser everytime it triggered to change. Usually the trigger comes from file changes (php, js, css). To implement this, simply chain `.browserSync` to webpack.mix.js:
```js
mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/proker.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/proker.scss', 'public/css')
   .browserSync({
      proxy: 'localhost:8000'
   });
```
as you can see, the browser sync will proxy `localhost:8000` which is the port that laravel use when we run `php artisan serve`.

### Code Splitting

To make page loads faster, use code-splitting. Don't load unnecessary assets. This can be achieved by separating css and js for each page. Follow this guideline for code-splitting.

1. Add specific asset to the mix's chain inside webpack.mix.js.
```js
mix.js('path/to/your/js', 'destination/folder')
   .sass('path/to/your/sass', 'destination/folder');
```
2. Define section to put styles and scripts in your layout. If you are using `public.blade.php`, the section already exists.
```html
<!-- public.blade.php -->
@section('styles')
<!-- these are global scripts that will be used for all pages that extend this layout -->
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@show
```

3. Then add your specific asset using section extension
```html
<!-- proker.blade.php -->
@extends('layouts.public')

@section('scripts')
  @parent
  <!-- proker.js will append to scripts section in public layout -->
  <script src="{{ asset('js/proker.js') }}" type="text/javascript"></script>
@endsection
```
`P.S.`  I don't know whether this approach is the best practice or not (because I rarely develop laravel). If you have a better approach, PRs are welcome.