const webpack = require("webpack");
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const CleanWebpackPlugin = require('clean-webpack-plugin');
const CopyWebpackPlugin = require("copy-webpack-plugin");
const WriteFilePlugin = require("write-file-webpack-plugin");
const package = "starter";

if ( package === "starter" ) {
    var elements = "assets/elements_starter";
    var skeletonPath = "assets/elements_starter/skeleton.html";
} else if ( package === "professional" ) {
    var elements = "assets/elements_professional";
    var skeletonPath = "assets/elements_professional/skeleton.html";
} else if ( package === "enterprise" ) {
    var elements = "assets/elements_enterprise";
    var skeletonPath = "assets/elements_enterprise/skeleton.html";
}

module.exports = {
    entry: {
        builder: './assets/js/builder.js',
        sites: './assets/js/sites.js',
        images: './assets/js/images.js',
        settings: './assets/js/settings.js',
        users: './assets/js/users.js',
        login: './assets/js/login.js',
        register: './assets/js/register.js',
        packages: './assets/js/packages.js',
        sent: './assets/js/sent.js',
        autoupdate: './assets/js/autoupdate.js',
        inblock: './assets/js/inblock.js'
    },
    output: {
        path: __dirname + '/build/',
        publicPath: '/build/',
        filename: '[name].bundle.js'
    },
    devServer: {
        outputPath: __dirname + '/build',
        inline: true,
        headers: {
            "Access-Control-Allow-Origin": "*",
        }
    },
    module: {
        preLoaders: [
            {
                test: /\.js$/,
                include: [
                    /js\/modules/,
                    /js\/[a-z]*.js$/
                ],
                exclude: [
                    /slim\.commonjs\.js/
                ],
                loader: "jshint-loader"
            }
        ],
        loaders: [
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract("style-loader", "css-loader?sourceMap")
            },
            {
                test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
                loader: 'url?limit=10000&mimetype=image/svg+xml'
            },
            {
                test: /\.eot(\?v=\d+\.\d+\.\d+)?$/, 
                loader: 'file'
            },
            {
                test: /\.(woff(\?v=\d+\.\d+\.\d+)|woff2(\?v=\d+\.\d+\.\d+)|woff|woff2)$/,
                loader: 'url?limit=5000&mimetype=application/font-woff'
            },
            {
                test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/, 
                loader: 'url?limit=10000&mimetype=application/octet-stream'
            },
            {
                test: /\.(jpe?g|png|gif|svg)$/i,
                loader: 'url?limit=10000!img?progressive=true'
            },
            {
                test: /\.scss$/,
                loaders: ["style-loader", "css-loader?sourceMap", "sass-loader?sourceMap"]
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: "babel-loader"
            }
        ]
    },
    jshint: {
        esversion: 6,
        bitwise: true,
        eqeqeq: true,
        forin: true,
        freeze: true,
        futurehostile: true,
        newcap: true,
        latedef: 'nofunc',
        noarg: true,
        nocomma: true,
        nonbsp: true,
        nonew: true,
        strict: true,
        undef: true,
        node: true,
        browser: true,
        loopfunc: true,
        laxcomma: true,
        '-W121': false,
        '-W089': false,
        '-W055': false,
        '-W069': false,
        globals: {
            define: false,
            alert: false,
            confirm: false,
            ace: false,
            $: false,
            jQuery: false
        }
    },
    
    devtool: 'source-map', //!comment if production or push on github
    plugins: [
        new WriteFilePlugin(),
        new ExtractTextPlugin("[name].css"),
        new CleanWebpackPlugin(['build', 'elements'], {
            root: __dirname,
            verbose: true, 
            dry: false
        }),
        new CopyWebpackPlugin([
            {from: skeletonPath, to: __dirname + '/elements/skeleton.html'},
            {from: elements, to: __dirname + '/elements'},
            {from: 'assets/css/blocks.css', to: __dirname + '/elements/css/blocks.css'},
            {from: 'assets/images/thumbs', to: __dirname + '/elements/thumbs'},
            {from: 'assets/images/component_thumbs', to: __dirname + '/elements/thumbs/components'}
        ])
    ]
};
