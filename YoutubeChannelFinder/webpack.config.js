var HtmlWebpackPlugin = require("html-webpack-plugin");
var CleanWebpackPlugin = require('clean-webpack-plugin');
module.exports =  {
    entry: './src/app.js',
    output: {
        filename: 'main.bundle.js',
        path: __dirname + '/dist'
    },
    module: {
        rules: [
            {test: /\.css$/, use: ['style-loader', 'css-loader']},
            {
                test: /\.(png|svg|jpg|gif|JPG)$/,
                use: [{loader: 'file-loader',
                        options: { outputPath: 'assets/'}
                        }]
            },
            {
                test: /\.html$/,
                use: ['html-loader']
            },
            { test: /\.handlebars$/, loader: "handlebars-loader" },
            {test: /\.(js|jsx)$/,
           exclude: /node_modules/,
          loader: 'babel-loader'
}
        ]
    },
    plugins: [
        new HtmlWebpackPlugin({ template: 'src/index.html'}),
        new CleanWebpackPlugin()
    ]
   

};