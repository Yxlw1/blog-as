import gulp from 'gulp';
import imagemin from 'gulp-imagemin';
import webp from 'gulp-webp'
import notify from 'gulp-notify';

const { series, src, dest, watch, parallel } = gulp;

const paths = {
    imagenes: '/home/iwl/Imágenes/Paginas/Blog de Analisis de Sistemas/img/**/*'
}

function MinifyImages() {
    return src(paths.imagenes)
        .pipe(imagemin())
        .pipe(dest('resources/assets/img'))
        .pipe(notify({message: 'Imagen Minificada'}))
}

function ConvertWebp() {
    return src(paths.imagenes)
        .pipe(webp())
        .pipe(dest('resources/assets/img'))
        .pipe(notify({message: 'Imagen Webp Lista'}))
}

export {MinifyImages, ConvertWebp};

export default series(MinifyImages, ConvertWebp);


