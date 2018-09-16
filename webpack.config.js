const path = require('path');

module.exports = {
	entry: ['./src/entry.js', './src/style.scss'],
	output: {
		path: path.resolve(__dirname, 'src'),
		filename: 'app.js'
	},
	module: {
		rules: [
			{
				test: /style\.scss$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							name: 'style.css',
						}
					},
					{
						loader: 'extract-loader'
					},
					{
						loader: 'css-loader'
					},
					{
						loader: 'sass-loader'
					}
				]
			}
		]
	}
};