
- dentro del proyecto de laravel instalar tailwindcss 
  npm install -D tailwindcss postcss autoprefixer

- despues iniciar
  npx tailwindcss init -p

- en tailwind.config.js poner
  /** @type {import('tailwindcss').Config} */
  export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  }

- en el archivo ./resources/css/app.css poner
  @tailwind base;
  @tailwind components;
  @tailwind utilities;

- iniciar vite
  npm run dev

- en el html poner @vite('resources/css/app.css')
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
  </head>

