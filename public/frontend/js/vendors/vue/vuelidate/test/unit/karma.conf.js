// This is a karma config file. For more details see
//   http://karma-runner.github.io/0.13/config/configuration-file.html
// we are also using it with karma-webpack
//   https://github.com/webpack/karma-webpack

var path = require('path')
var merge = require('webpack-merge')
var baseConfig = require('../../build/webpack.base.conf')
var utils = require('../../build/utils')
var webpack = require('webpack')

var webpackConfig = merge(baseConfig, {
  mode: 'development',
  // use inline sourcemap for karma-sourcemap-loader
  devtool: '#inline-source-map',
  module: {
    rules: [
      // instrument only testing sources with Istanbul
      {
        test: /\.js$/,
        use: {
          loader: 'istanbul-instrumenter-loader',
          options: {
            esModules: true
          }
        },
        enforce: 'post',
        include: path.resolve('src')
      }
    ]
  },
  plugins: [
    new webpack.DefinePlugin({
      'process.env': require('../../config/test.env')
    })
  ]
})

// no need for app entry during tests
delete webpackConfig.entry

process.env.CHROME_BIN = require('puppeteer').executablePath()

module.exports = function(config) {
  config.set({
    // to run in additional browsers:
    // 1. install corresponding karma launcher
    //    http://karma-runner.github.io/0.13/config/browsers.html
    // 2. add it to the `browsers` array below.
    browsers: ['ChromeHeadless'],
    frameworks: ['mocha', 'sinon-chai'],
    reporters: ['spec', 'coverage-istanbul'],
    files: ['./index.js'],
    preprocessors: {
      './index.js': ['webpack', 'sourcemap']
    },
    webpack: webpackConfig,
    webpackMiddleware: {
      noInfo: true
    },
    coverageIstanbulReporter: {
      dir: './coverage',
      reporters: [{ type: 'lcov', subdir: '.' }, { type: 'text-summary' }],
      instrumenterOptions: {
        istanbul: { noCompact: true }
      }
    }
  })
}
