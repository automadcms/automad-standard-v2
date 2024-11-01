const path = require('path');
const webpack = require('webpack');
const TerserPlugin = require('terser-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-v3-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const pkg = require('./package.json');

module.exports = (env, argv) => {
	const devMode = argv.mode === 'development';
	const config = {
		entry: {
			main: './client/index.ts',
		},
		output: {
			path: path.resolve(__dirname, './dist'),
			filename: '[name].bundle.js',
		},
		module: {
			rules: [
				{
					test: /\.ts$/,
					use: ['ts-loader'],
					exclude: /node_modules/,
				},
				{
					test: /\.(less|css)$/i,
					use: [
						MiniCssExtractPlugin.loader,
						'css-loader',
						'less-loader',
					],
				},
				{
					test: /\.svg$/,
					loader: 'html-loader',
				},
				{
					test: /\.woff2?$/i,
					type: 'asset/resource',
					generator: {
						filename: '../fonts/[name][ext][query]',
					},
				},
			],
		},
		resolve: {
			extensions: ['.ts', '.js'],
			alias: {
				'@': path.resolve(__dirname, './client'),
			},
		},
		optimization: {
			minimizer: [
				new CssMinimizerPlugin(),
				new TerserPlugin({
					extractComments: false,
				}),
				'...',
			],
			splitChunks: {
				cacheGroups: {
					vendor: {
						test: /node_modules/,
						chunks: 'all',
						name: 'vendor',
						enforce: true,
					},
				},
			},
		},
		plugins: [
			new MiniCssExtractPlugin({
				filename: '[name].bundle.css',
			}),
			new webpack.BannerPlugin({
				banner: () => {
					const year = new Date().getFullYear();

					return `Automad Standard v2 (${pkg.version}), (c) ${year} ${pkg.author}, ${pkg.license} license`;
				},
				exclude: /vendor/,
			}),
		],
	};

	if (devMode) {
		config.watch = true;
		config.devtool = 'source-map';
		config.plugins.push(
			new BrowserSyncPlugin({
				host: 'localhost',
				port: 3000,
				proxy: 'http://127.0.0.1:8080/automad-development',
				files: ['**/*.php'],
				ignore: [],
				notify: false,
				open: false,
			})
		);
	}

	return config;
};
