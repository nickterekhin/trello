const webpack = require('webpack');
const path = require('path');
const _root = path.resolve(__dirname,'../trello');


       
function root(args){
    args = Array.prototype.slice.call(arguments,0);
    return path.join.apply(path, [_root].concat(args));
}

const srcFolder = root('resources/frontend');
const distFolder = root('public/');

const PATHS = {
    src: `${srcFolder}/src`,
    dist: `${distFolder}/js`,
    distAssets:`${distFolder}/assets`,
    srcAssets:`${srcFolder}/assets`,
    context:`${srcFolder}/context`,
};
const webPackConfig =(env)=> {
    
    const NODE_ENV = env.NODE_ENV || 'development';
    return {
        mode: NODE_ENV,
        entry: {
            main: [`${PATHS.src}/index.jsx`],
        },
        output: {
            path: `${PATHS.dist}`,
            publicPath: '/',
            filename: '[name].js',
            chunkFilename: '[name].js'
        },
        resolve: {
            modules: ['node_modules'],
            extensions: ['.tsx', '.ts', '.js', '.jsx']
        },
        resolveLoader: {
            modules: ['node_modules'],
        },

        module: {
            rules: [
                {
                    test: /\.css$/,
                    use: [
                        "style-loader",
                        {loader: "css-loader", options: {import: true}},
                    ],
                    exclude: /node_modules/,
                    include: PATHS.src
                },
                {
                    test: /\.(ts|js)x?$/,
                    include: PATHS.src,
                    exclude: /node_modules/,
                    use: {
                        loader: "babel-loader",
                        options: {
                            presets: [
                                "@babel/preset-env",
                                "@babel/preset-react",
                                "@babel/preset-typescript",
                            ],
                            plugins: [
                                ["@babel/transform-runtime"]
                            ]
                        },
                    },
                },
            ],
        },
    }
}

module.exports = webPackConfig;