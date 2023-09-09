/* eslint-env node */
/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin');

module.exports = {
	content: ['./src/**/*.{html,js,php}'],
	corePlugins: {
		container: false,
	},
	plugins: [
		require('@tailwindcss/typography'),
		plugin(function ({ addComponents, addUtilities, theme }) {
			addComponents({
				'.container': {
					maxWidth: '100%',
					marginLeft: theme('spacing.6'),
					marginRight: theme('spacing.6'),
					'@screen sm': {
						marginLeft: theme('spacing.8'),
						marginRight: theme('spacing.8'),
					},
					'@screen md': {
						marginLeft: theme('spacing.16'),
						marginRight: theme('spacing.16'),
					},
					'@screen lg': {
						marginLeft: 'auto',
						marginRight: 'auto',
						maxWidth: theme('maxWidth.2xl'),
					},
					'@screen xl': {
						maxWidth: theme('maxWidth.4xl'),
					},
					'@screen 2xl': {
						maxWidth: theme('maxWidth.6xl'),
					},
				},
			});
			addUtilities({
				'.p-base': {
					padding: theme('padding.4'),
					'@screen md': {
						padding: theme('padding.6'),
					},
					'@screen lg': {
						padding: theme('padding.8'),
					},
					'@screen xl': {
						padding: theme('padding.12'),
					},
				},
			});
		}),
		function ({ addComponents }) {
			addComponents({});
		},
	],
	theme: {
		colors: {
			black: '#000000',
			white: '#FFFFFF',
			dark: '#1C2321',
			light: '#FBFBFC',
			grey: '#A9B4C2',
			purple: '#6610F2',
			yellow: '#F8BA12',
			orange: '#FF331F',
		},
		extend: {
			fontFamily: {
				sans: ['Poppins', ...defaultTheme.fontFamily.sans],
				display: ['Montserrat', ...defaultTheme.fontFamily.sans],
			},
		},
	},
};
