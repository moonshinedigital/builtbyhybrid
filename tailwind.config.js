/* eslint-env node */
/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin');

module.exports = {
	content: ['./src/**/*.{html,js,php}', './build/**/*.{html,js,php}'],
	corePlugins: {
		container: false,
	},
	plugins: [
		require('@tailwindcss/typography'),
		require('@tailwindcss/forms'),
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
			typography: ({ theme }) => ({
				DEFAULT: {
					css: {
						'--tw-prose-body': theme('colors.dark'),
						'--tw-prose-headings': theme('colors.purple'),
						'--tw-prose-lead': theme('colors.dark'),
						'--tw-prose-links': theme('colors.purple'),
						'--tw-prose-bold': theme('colors.dark'),
						'--tw-prose-counters': theme('colors.dark'),
						'--tw-prose-bullets': theme('colors.purple'),
						'--tw-prose-hr': theme('colors.purple'),
						'--tw-prose-quotes': theme('colors.purple'),
						'--tw-prose-quote-borders': theme('colors.purple'),
						'--tw-prose-captions': theme('colors.dark'),
						'--tw-prose-code': theme('colors.dark'),
						'--tw-prose-pre-code': theme('colors.dark'),
						'--tw-prose-pre-bg': theme('colors.dark'),
						'--tw-prose-th-borders': theme('colors.purple'),
						'--tw-prose-td-borders': theme('colors.purple'),
						'--tw-prose-invert-body': theme('colors.white'),
						'--tw-prose-invert-headings': theme('colors.orange'),
						'--tw-prose-invert-lead': theme('colors.dark'),
						'--tw-prose-invert-links': theme('colors.white'),
						'--tw-prose-invert-bold': theme('colors.white'),
						'--tw-prose-invert-counters': theme('colors.dark'),
						'--tw-prose-invert-bullets': theme('colors.dark'),
						'--tw-prose-invert-hr': theme('colors.dark'),
						'--tw-prose-invert-quotes': theme('colors.purple'),
						'--tw-prose-invert-quote-borders':
							theme('colors.purple'),
						'--tw-prose-invert-captions': theme('colors.dark'),
						'--tw-prose-invert-code': theme('colors.white'),
						'--tw-prose-invert-pre-code': theme('colors.dark'),
						'--tw-prose-invert-pre-bg': 'rgb(0 0 0 / 50%)',
						'--tw-prose-invert-th-borders': theme('colors.dark'),
						'--tw-prose-invert-td-borders': theme('colors.dark'),
					},
				},
				invert: {
					css: {
						'--tw-prose-body': theme('colors.white'),
						'--tw-prose-headings': theme('colors.orange'),
						'--tw-prose-lead': theme('colors.white'),
						'--tw-prose-links': theme('colors.orange'),
						'--tw-prose-bold': theme('colors.white'),
						'--tw-prose-counters': theme('colors.white'),
						'--tw-prose-bullets': theme('colors.orange'),
						'--tw-prose-hr': theme('colors.orange'),
						'--tw-prose-quotes': theme('colors.orange'),
						'--tw-prose-quote-borders': theme('colors.orange'),
						'--tw-prose-captions': theme('colors.white'),
						'--tw-prose-code': theme('colors.white'),
						'--tw-prose-pre-code': theme('colors.white'),
						'--tw-prose-pre-bg': theme('colors.white'),
						'--tw-prose-th-borders': theme('colors.orange'),
						'--tw-prose-td-borders': theme('colors.orange'),
						'--tw-prose-invert-body': theme('colors.dark'),
						'--tw-prose-invert-headings': theme('colors.orange'),
						'--tw-prose-invert-lead': theme('colors.white'),
						'--tw-prose-invert-links': theme('colors.dark'),
						'--tw-prose-invert-bold': theme('colors.dark'),
						'--tw-prose-invert-counters': theme('colors.white'),
						'--tw-prose-invert-bullets': theme('colors.white'),
						'--tw-prose-invert-hr': theme('colors.white'),
						'--tw-prose-invert-quotes': theme('colors.orange'),
						'--tw-prose-invert-quote-borders':
							theme('colors.orange'),
						'--tw-prose-invert-captions': theme('colors.white'),
						'--tw-prose-invert-code': theme('colors.dark'),
						'--tw-prose-invert-pre-code': theme('colors.white'),
						'--tw-prose-invert-pre-bg': 'rgb(0 0 0 / 50%)',
						'--tw-prose-invert-th-borders': theme('colors.white'),
						'--tw-prose-invert-td-borders': theme('colors.white'),
					},
				},
			}),
		},
	},
};
