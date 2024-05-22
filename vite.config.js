import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [react()],
  // Other Vite configurations...
  assetsInclude: ['**/*.jpg', '**/*.JPG'], // Include JPG files as asset
})
// vite.config.js


