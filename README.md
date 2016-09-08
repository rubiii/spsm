#  WP Theme for St. Pauli selber machen


## Development

Use Gulp to build CSS and JavaScript files and Bower to install dependencies.
You can install these dependencies via NPM:

```
npm install
```

Run `bower` to install dependencies:

```
node_modules/.bin/bower install  # Installs dependecies
```

Then you can run `gulp` to build CSS and JavaScript files:

```
node_modules/.bin/gulp
```

You can also have `gulp` watch for file changes:

```
node_modules/.bin/gulp watch
```

## Upload

Gulp creates a `public` directory with all the assets.
This folder and everything in the root directory need to be uploaded to the server.
The assets directory as well as the bower_components and node_modules directories
do not need to uploaded.
