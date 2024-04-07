module.exports = (ctx) => ({
    syntax: ctx.file.extname === '.scss' ? require('postcss-scss') : '',
    plugins: [
        require('autoprefixer')({}),
    ]
});
