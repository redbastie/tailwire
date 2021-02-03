![Tailwire](https://i.imgur.com/1U0BcXD.png)

# Tailwire

Build reactive web apps without having to write HTML, CSS, or JavaScript! Powered by Laravel Livewire and Tailwind.

Imagine a world where you no longer have to constantly context switch between HTML, CSS, and Javascript. Where all of your code can reside in self-contained PHP component classes. Even your database migration logic can stay inside of your models. It's kind of like SwiftUI for PHP!

<a href="https://www.youtube.com/watch?v=UhC_jBIXYWE"><img src="https://i.imgur.com/jE6vY70.png"></a>

#### Requirements

- Laravel 8
- PHP 8
- NPM

#### Features

- Expressive HTML builder written using PHP
- Tailwind styling & configuration built in
- Laravel Livewire component property & action wiring
- Handy directives for if, each, include, etc. statements
- Commands for install, auth, components, CRUD, models, & automatic migrations
- Automatic component routing
- Automatic model migrations
- Automatic user timezones
- Easy app versioning
- PWA capabilities (standalone launcher, icons, etc.)
- Swipe down refresh (iOS PWA)
- Infinite scrolling
- Heroicon integration
- Honeypot spam rejection
- & more!

#### Packages Used

- [Laravel Livewire](https://github.com/livewire/livewire)
- [Laravel Timezone](https://github.com/jamesmills/laravel-timezone)
- [Doctrine DBAL](https://github.com/doctrine/dbal)
- [Honey](https://github.com/lukeraymonddowning/honey)
- [TailwindCSS](https://github.com/tailwindlabs/tailwindcss)
- [Blade Heroicons](https://github.com/blade-ui-kit/blade-heroicons)

#### Docs

- [Installation](#installation)
- [Commands](#commands)
    - [Install Tailwire](#install-tailwire)
    - [Generate auth scaffolding](#generate-auth-scaffolding)
    - [Generate a component](#generate-a-component)
    - [Generate CRUD components](#generate-crud-components)
    - [Generate a Tailwire model](#generate-a-tailwire-model)
    - [Run automatic migrations](#run-automatic-migrations)
- [Usage](#usage)
    - [Routing full page components](#routing-full-page-components)
    - [Extending layout components](#extending-layout-components)
    - [Building HTML elements](#building-html-elements)
    - [Styling elements via Tailwind](#styling-elements-via-tailwind)
    - [Wiring elements via Livewire](#wiring-elements-via-livewire)
    - [Using directives & other methods](#using-directives--other-methods)
- [Extras](#extras)
    - [Swipe down refresh](#swipe-down-refresh)
    - [Infinite scrolling](#infinite-scrolling)

#### Links

- Support: [GitHub Issues](https://github.com/redbastie/swift/issues)
- Contribute: [GitHub Pulls](https://github.com/redbastie/swift/pulls)
- Donate: [PayPal](https://www.paypal.com/paypalme2/kjjdion)

## Installation

Create a new Laravel 8 project:

```console
laravel new my-app
```

Configure your `.env` app, database, and mail values:

```env
APP_*
DB_*
MAIL_*
```

Require Tailwire via composer:

```console
composer require redbastie/tailwire
```

Install Tailwire:

```console
php artisan tailwire:install
```

## Commands

### Install Tailwire

```console
php artisan tailwire:install
```

Installs the layout & index components, User model & factory, config files, icons, PWA manifest, Tailwind CSS & config, JavaScript assets, webpack, and runs the necessary NPM commands.

### Generate auth scaffolding

```console
php artisan tailwire:auth
```

Generates auth components including login, logout, register, password reset, and home.

### Generate a component

```console
php artisan tailwire:component {class} {--full} {--modal} {--list} {--model=}
```

Generates a Tailwire component. Use `--full` to generate a full page component, `--modal` for a modal, `--list --model=ModelClass` for a list, or omit all options for a basic component.

#### Examples

```console
php artisan tailwire:component VehicleItem
php artisan tailwire:component VehiclePage --full
php artisan tailwire:component Admin/InsuranceDialog --modal
php artisan tailwire:component VehicleList --list --model=Vehicle
```

### Generate CRUD components

```console
php artisan tailwire:crud {class}
```

Generates CRUD components for the specified model class. If the model class does not exist, it will be created along with a factory automatically.

If you specify `User` as the class, full user CRUD will be generated.

#### Examples

```console
php artisan tailwire:crud Vehicle
php artisan tailwire:crud Admin/Insurance
```

### Generate a Tailwire model

```console
php artisan tailwire:model {class}
```

Generates a Tailwire model and factory which comes with the automatic migration method and factory definition included. As with other commands, you can specify a subdirectory for the class.

#### Examples

```console
php artisan tailwire:model Vehicle
php artisan tailwire:model Admin/Insurance
```

### Run automatic migrations

```console
php artisan tailwire:migrate {--fresh} {--seed} {--force}
```

Runs automatic migrations for all of your Tailwire models which have a `migration` method specified. This uses Doctrine to automatically diff your database and apply the necessary changes. 

Optionally use `--fresh` to wipe the database, and `--seed` to run your seeders afterwards. If you wish to run this in production, use the `--force`.

Note that if you still want to use traditional Laravel migration files, they will run *before* automatic migration methods.

## Usage

### Routing full page components

```php
class Login extends Component
{
    public $routeUri = '/login';
    public $routeName = 'login';
    public $routeMiddleware = 'guest';
```

Specify public `$route*` properties in your Tailwire component in order to enable automatic routing. A minimum of `$routeUri` is required in order to enable automatic routing for the component. Available properties include `$routeUri`, `$routeName`, `$routeMiddleware` (string or array), `$routeDomain`, `$routeWhere` (array).

If using route parameters, be sure to include them in a `mount` method:

```php
class Vehicle extends Component
{
    public $routeUri = '/vehicle/{vehicle}';
    public $routeName = 'vehicle';
    public $routeMiddleware = ['auth'];
    public $vehicle;
    
    public function mount(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }
```

### Extending layout components

```php
class Login extends Component
{
    public $viewTitle = 'Login';
    public $viewExtends = 'layouts.app';
```

Specify a `$viewExtends` property which uses dot notation to point to the component that this component will extend. In this example, the `$viewExtends` property is pointing to the `Layouts/App` component.

In the `Layouts/App` component, the `$v->yield()` method is used in order to render the child component inside:

```php
class App extends Component
{
    public function view(View $v)
    {
        return $v->body(
            $v->header('Header content')->class('text-xl'),
            $v->yield(),
            $v->footer('Footer content')->class('text-sm'),
        )->class('bg-gray-100');
```

### Building HTML elements

```php
class Home extends Component
{
    public function view(View $v)
    {
        return $v->section(
            $v->h1('Home')->class('text-xl px-6 py-4'),
            $v->p('You are logged in!')->class('p-6')
        )->class('bg-white shadow divide-y');
    }
```

Tailwire uses an expressive syntax in order to build HTML elements. As you can see, the `$v` variable is used to construct each element in the view. The first method of a `$v` chain consists of the HTML element name. A list of available HTML element names can be found here: [HTML Element Reference](https://www.w3schools.com/tags/default.asp)

After the first method, each additional chained method represents an attribute of the element. For example, creating an image:

```php
$v->img()->src(asset('images/icon-fav.png'))->class('w-5 h-5')
```

This would translate to an image with an `src` of the asset URL, using the Tailwind classes `w-5 h-5` for styling. A list of available HTML element attributes can be found here: [HTML Attribute Reference](https://www.w3schools.com/tags/ref_attributes.asp)

In this example, you can see that the `img` method does not accept any parameters, because it does not use a closure tag. Elements that use a closure tag, such as `div`, do accept `...$content` parameters, which you can use in order to build content inside:

```php
$v->div(
    $v->p('Hello')->class('text-red-600'),
    $v->p('World')->class('text-green-600'),
)->class('bg-blue-100')
```

### Styling elements via Tailwind

```php
$v->icon('refresh')->class('animate-spin text-gray-400 w-5 h-5 mx-auto')
```

Specify the Tailwind classes for an element within the chained `class()` method.

Now you might be thinking, "but there isn't autocomplete!" Good news; I made a PHPStorm package for that: [TailwindCSS PHP Autocomplete](https://plugins.jetbrains.com/plugin/16014-tailwindcss-php-autocomplete)

### Wiring elements via Livewire

Along with HTML attributes, Tailwire also allows you to wire up your elements to make them reactive via Livewire. The method names are specified according to Livewire attribute conventions, which can be found here: [Laravel Livewire docs](https://laravel-livewire.com/docs/2.x/quickstart)

#### Modelling data

```php
$v->input()->type('email')->id('email')->wireModelDefer('email')
```

Tailwire components contain a public `$model` array which will contain the data that is modelled through elements like inputs, selects, etc. 

You can grab the data using the `$this->model()` helper method:

```php
$email = $this->model('email');
```

If your modelled data is an array, you can use the dot notation to grab values from the array:

```php
$userName = $this->model('user.name');
```

You validate the `$model` data using `$this->validate()`:

```php
$validated = $this->validate([
    'email' => ['required', 'email'],
]);
```

When checking for validation errors, you can use the `$this->error()` method to check if a validation error exists for the modelled data:

```php
$v->if($this->error('email'), 
    fn() => $v->p($this->error('email'))->class('text-xs text-red-600')
)
```

#### Performing actions

```php
class Counter extends Component
{
    public $count = 0;

    public function view(View $v) 
    {
        return $v->div(
            $v->button('Increment Count')->wireClick('incrementCount'),
            $v->p($this->count)->class('text-blue-600'),
        );
    }
    
    function incrementCount()
    {
        $this->count++;
    }
```

As you can see, you can wire up particular actions via the `wire*` methods as well. This includes things like clicking, polling, submitting, etc. If your action uses parameters, simply specify them in the `wire*` method:

```php
public function view(View $v) 
{
    return $v->div(
        $v->button('Increment Count')->wireClick('incrementCount', 2),
        $v->p($this->count)->class('text-blue-600'),
    );
}

function incrementCount($amount)
{
    $this->count += $amount;
}
```

The beauty of this is that it allows you to keep all of your logic inside the Tailwire component classes themselves! No more switching between tons of files and languages and wondering where things happen.

### Using directives & other methods

The `View $v` variable also allows you to use some handy directives inside your `view` method, such as if statements, each loops, includes, and more.

#### If statements

```php
$v->if(Auth::guest(),
    fn() => $v->p('You are signed out.')
)->else(
    fn() => $v->p('You are signed in!)
)
```

#### Each loops

```php
$v->each(Vehicle::all(),
    fn(Vehicle $vehicle) => $v->div(
        $v->p($vehicle->name),
        $v->p($vehicle->created_at)->class('text-xs text-gray-600')
    )
)->empty(
    fn() => $v->p('No vehicles found.')
),
```

#### Including partial components

```php
$v->include('user-list-item', $user),
```

#### Heroicons ([list of available icons here](https://heroicons.com))

```php
$v->icon('cog')->class('text-blue-600 w-5 h-5'),
```

#### Swipe down to refresh indicator (for iOS PWA's)

```php
$v->swipeDownRefresh(
    $v->icon('refresh')->class('animate-spin text-gray-400 w-5 h-5 mx-auto')
)->class('mb-4'),
```

#### Infinite scrolling indicator

```php
$v->infiniteScroll(
    $v->icon('refresh')->class('animate-spin text-gray-400 w-5 h-5 mx-auto')
)->class('mt-4'),
```

## Extras

### Swipe down refresh

```php
$v->swipeDownRefresh(
    $v->icon('refresh')->class('animate-spin text-gray-400 w-5 h-5 mx-auto')
)->class('mb-4'),
```

If a user has scrolled `-100px` from the top of the page, the `swipeDownRefresh` element will display briefly before the entire page is reloaded. This is useful for PWA's, when the user adds your web app to their home screen and needs a way to refresh the page.

### Infinite scrolling

```php
public function view(View $v)
{
    return $v->section(
        $v->h1('Vehicles')->class('text-xl mb-2'),

        $v->each($this->query()->paginate($this->perPage),
            fn(Vehicle $vehicle) => $v->div(
                $v->p($vehicle->name),
                $v->p(timezone($vehicle->created_at))->class('text-xs text-gray-600')
            )->class('px-6 py-4')
        ),

        $v->if($this->query()->count() > $this->perPage,
            fn() => $v->infiniteScroll(
                $v->icon('refresh')->class('animate-spin text-gray-400 w-5 h-5 mx-auto')
            )->class('mt-4')
        )
    );
}

public function query()
{
    return Vehicle::query()->orderBy('name');
}
```

Each Tailwire component contains a `$perPage` public property which is incremented if the hidden `infiniteScroll` element is present on the page and the user scrolls `100px` from the bottom. After it is incremented, the component should load more items and hide the `infiniteScroll` element again. See how `query()`, `paginate()`, `count()`, and `$perPage` are used in the example above.

### Honeypot spam prevention

```php
$v->form(
    $v->div(
        $v->label('Email')->for('email'),
        $v->input()->type('email')->id('email')->wireModelDefer('email')
            ->class(($this->error('email') ? 'border-red-500' : 'border-gray-300') . ' w-full'),
        $v->if($this->error('email'), fn() => $v->p($this->error('email'))->class('text-xs text-red-600'))
    )->class('space-y-1'),

    $v->div(
        $v->label('Password')->for('password'),
        $v->input()->type('password')->id('password')->wireModelDefer('password')
            ->class(($this->error('password') ? 'border-red-500' : 'border-gray-300') . ' w-full'),
        $v->if($this->error('password'), fn() => $v->p($this->error('password'))->class('text-xs text-red-600'))
    )->class('space-y-1'),

    $v->honey(), // stop spam bots!

    $v->button('Register')->type('submit')->class('text-white bg-blue-600 w-full py-2')
)->wireSubmitPrevent('register')->class('space-y-4 p-6')
```

Tailwire uses [Honey](https://github.com/lukeraymonddowning/honey) for spam bot prevention. See the repo for that package for more information. You can also use recaptcha by passing `true` to the element:

```php
$v->honey(true) // use honey with recaptcha (be sure to configure it!)
```
