// vite.config.js
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    // ✅ Tambahkan base path EKSPLISIT ke lokasi folder build
    base: "/build/",

    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/map.css",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
