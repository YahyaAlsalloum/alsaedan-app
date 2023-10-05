const { defineConfig } = require('@vue/cli-service')

module.exports = defineConfig({
  transpileDependencies: true,
  // publicPath: '/storage/app/public', // Comment out or remove this line
  devServer: {
    host: 'localhost',
    proxy: {
      '/api': {
        target: 'http://127.0.0.1:8000/', // Replace with the URL of your Laravel backend
        changeOrigin: true,
      },
    },
  },
})