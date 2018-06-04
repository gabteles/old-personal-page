'use strict';

// Dependências
var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

// Configuração
var config = {
    bowerDir: 'bower_components',
}

// Tarefa padrão
gulp.task('default', ['icons', 'sass', 'jquery']);

// Roda o SASS e gera sourceMaps
gulp.task('sass', function() {
    gulp.src('./sass/**/*.sass')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed',
            includePaths: [
                config.bowerDir + '/griddle',
                config.bowerDir + '/components-font-awesome/scss'
            ]
        }).on('error', sass.logError))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./css'));
});

// Assiste arquivos do SASS
gulp.task('sass:watch', function() {
    gulp.watch('./sass/**/*.sass', ['sass']);
});

// Copia os arquivos de fontes do FontAwesome
gulp.task('icons', function() {
    gulp.src(config.bowerDir + '/components-font-awesome/fonts/**.*')
        .pipe(gulp.dest('./fonts'))
});

// Copia os arquivos do jQuery
gulp.task('jquery', function() {
    gulp.src(config.bowerDir + '/jquery/dist/jquery.min.*')
        .pipe(gulp.dest('./scripts'))
});
