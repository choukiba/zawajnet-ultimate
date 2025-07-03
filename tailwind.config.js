
// tailwind.config.js

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        arabic: ['"Tajawal"', 'sans-serif'], // 👈 الخط الجديد
      },
    },
  },
  plugins: [],
};
