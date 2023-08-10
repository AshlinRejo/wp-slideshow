# Ashlin Slideshow

This is a WordPress plugin helps to create and display an image slideshow on any post/page through shortcode.

## Admin-side

Ashlin Slideshow creates an admin-side menu **Settings** -> **Ashlin Slideshow Settings** and provides an interface to add and remove images, also allows to change order of images.

Screenshot: [https://nimb.ws/myiBZt](https://nimb.ws/myiBZt)

## Front-end

By Adding the shortcode `[ashlin_slideshow]` to any post or pages, it will replace the shortcode by a slideshow of images uploaded in admin-side.

Screenshot: [https://nimb.ws/MlejUz](https://nimb.ws/MlejUz)

## Libraries used

1. [jQuery UI](https://jqueryui.com/)
2. [Responsive & Flexible Content Slider Plugin - flickity](https://www.jqueryscript.net/slider/Responsive-Flexible-Content-Slider-Plugin-flickity.html)

## Installing the plugin

1. Clone the directory into your plugins folder with below command.
`git clone https://github.com/rtlearn/wpcs-AshlinRejo.git /PATH-TO-PLUGINS-FOLDER/ashlin-slideshow`
2. Activate the plugin through the **Plugins** menu in WordPress.
3. Now you will find the menu **Settings** -> **Ashlin Slideshow Settings** in WordPress admin panel.

## Installing the development version

1. Clone the directory into your plugins folder with below command.
   `git clone https://github.com/rtlearn/wpcs-AshlinRejo.git /PATH-TO-PLUGINS-FOLDER/ashlin-slideshow`
2. Make sure you have Node.js ([Downloading and installing Node.js and npm](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm))
3. `npm install` to install the dependencies.
4. `composer install` to install dev dependencies.
5. Commands to run script 
   1. `npm run lint:php` (check phpcs).
   2. `npm run lint:php:fix` (fix phpcs).
   3. `npm run lint` (check eslint).
   4. `npm run lint:fix` (fix eslint).
   5. `npm run lint-css` (check stylelint).
   6. `npm run lint-css:fix` (fix stylelint).
   7. `precommit` (fix phpcs, eslint and stylelint).
6. Activate the plugin through the **Plugins** menu in WordPress.

## License
All the contents of this repository are licensed under the GPL v2 or later.