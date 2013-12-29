# EpicDocumentor

Write documentation in [Markdown](http://daringfireball.net/projects/markdown/) syntax using the [EpicEditor](https://github.com/OscarGodson/EpicEditor).

Pages are stored as files on the file system.

## Installation - Quick

* From https://github.com/elkuku/EpicDocumentor/releases download the file `EpicDocumentor_X.X.X_alldeps.tar.gz`
* Unpack it.
* The `www` directory contains a web page that can be served with a PHP enabled web server.

## Usage

### Write

![bildschirmfoto6](https://f.cloud.github.com/assets/33978/1814543/66b08830-6ef5-11e3-8fbb-6c06c31ea20c.png)

### Preview

![bildschirmfoto7](https://f.cloud.github.com/assets/33978/1814544/66b2d126-6ef5-11e3-9ee7-4ee9dab44d12.png)

### Full screen Write AND Preview

![bildschirmfoto8](https://f.cloud.github.com/assets/33978/1818192/d816f308-6fe8-11e3-8575-569bf834599b.png)

## Installation - DEV

This is only required if you want to modify some behaviour or would like to contribute to the project.

### Requirements

* [Composer](http://getcomposer.org/) is used to install all PHP dependencies like the Joomla! Framework.
* [Bower](http://bower.io/) is used to install all "media" dependencies like Bootstrap, JQuery etc.

### Installation

* Run `composer install`
* Run `bower install`
* Point a http address to the `www` directory.
