var webpack = require('webpack');
var path = require('path');
var srcPath = path.resolve(__dirname, 'scripts', 'script.js');
var dstPath = path.resolve(__dirname, 'web');
var jQueryPath = path.resolve(__dirname, 'node_modules/jquery/dist', 'jquery.js');

var config = {
  devtool: 'cheap-module-source-map',
  entry: srcPath,
  output: {
    path: dstPath,
    filename: 'app.js'
  },
  resolve : {
    alias: {
      jquery: jQueryPath
    }
  },
  module: {
    loaders: [
      {
        test: /\.json$/,
        loader: 'json-loader'
      }
    ]
  },
  plugins: [
    //new webpack.optimize.UglifyJsPlugin(),
    new webpack.optimize.OccurenceOrderPlugin(),
    new webpack.optimize.DedupePlugin()
  ]
};

module.exports = config;