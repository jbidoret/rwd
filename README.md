# Radical web design

Project initiated by [Julien Bidoret](https://www.accentgrave.net/) as part of the [web design and digital cultures](https://ateliers.esad-pyrenees.fr/web/) courses in [ÉSAD Pyrénées](https://esad-pyrenees.fr). Find out more on [radicalweb.design/about](https://radicalweb.design/about/).

The project is live on [radicalweb.design](https://radicalweb.design).

## Run

This repo is based on [kirby-basic-devkit](https://github.com/jbidoret/kirby-basic-devkit), that is a fork from [kirby-devkit](https://github.com/julien-gargot/kirby-devkit) by Julien Gargot + Louis Eveillard, a starting point to use Kirby 3.5 with Gulp 4 and Npm. It is made for developers to bootstrap their own projects quickly.

### Requirements

You will need Node.js, Npm and Git to run this project.

### Setup the project

1. clone this repo (as of Git 2.23),
  ```
  git clone --recurse-submodules https://github.com/jbidoret/rwd.git rwd
  ```
  Or, 
  ```
  git clone https://github.com/jbidoret/rwd.git rwd
  cd rwd
  git submodule update --init --recursive
  ```

2. install npm package from project root:
  ```
  npm install
  ```



### Configure with your server/site settings

1. rename the file in `site/config/config.localhost.php` to your local development site URL. The `environment` variable is used to load minified or unminified CSS/JS versions (checkout `snippets/header.php` and `snippets/footer.php`).
2. to be able to use browser sync (live reloading, remote debugging, and a few other nice features), set the `localDevUrl` variable to the URL of your site in `assets/manifest.js`.

### Compile and sync
To compile all files, for **development** and **production** :
  ```
  gulp
  ```

  To make it faster, while developing, you can watch for changes to CSS and JS files in the assets folder. This task only compiles **development** files.
  ```
  gulp dev
  ```

  Same as `gulp dev` with live reload.
  ```
  gulp sync
  ```
  