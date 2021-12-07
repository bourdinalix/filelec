const path = require('path');
const config  = require('./webpack.var');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const HtmlWebpackPartialsPlugin = require('html-webpack-partials-plugin');
let fs = require('fs');


module.exports = {
  entry: path.resolve(config.src, config.js.folder, config.js.entryFile),
  output: {
    filename: config.js.outputFile,
    path: path.resolve(__dirname, config.dist),
  },
  
  plugins: [
    new CopyPlugin({
      patterns: [
        // { from: '**/*.php', context: 'src/php-layout' },
        // { from: '**/*.php', context: 'src/php-modules' },
        // { from: '**/*.php', context: 'src/php-pages' },
        { from : '**/*', to: 'img/', context: 'src/img'},
        // { from: '**/.htaccess', context: 'src/statics' },
      ],
    }),
    
    new CleanWebpackPlugin(),

    new MiniCssExtractPlugin({
        // Options similar to the same options in webpackOptions.output
        // both options are optional
        filename: '[name].css',
        chunkFilename: '[id].css',
      }),
  ],
  
  module: {
      rules: [
          {
              test: /\.m?js$/,
              exclude: /(node_modules|bower_components)/,
              use: {
                  loader: 'babel-loader',
                  options: {
                      presets: ['@babel/preset-env']
                    }
                }
            },

            {
                test: /\.s[ac]ss$/i,
                use: [
                  MiniCssExtractPlugin.loader,
                  'css-loader',
                  'sass-loader',
                ],
              },

              {
                test: /\.(png|jpg)$/,
                loader: 'url-loader'
              },
        ],
    }
}
