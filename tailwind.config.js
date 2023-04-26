/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ['./**/*.{html,js,php}'],
	theme: {
		extend: {
			colors: {
				primary: '#eb144c',
				primaryDark: '#da154a',
				secondary: '#f2f2f2',
				textColor: '#212529',
				linkColor: '#0066c0',
			},
		},

		screens: {
			sm: '540px',
			// => @media (min-width: 640px) { ... }

			md: '720px',
			// => @media (min-width: 768px) { ... }

			lg: '960px',
			// => @media (min-width: 1024px) { ... }

			xl: '1140px',
			// => @media (min-width: 1280px) { ... }
		},
	},
	plugins: [],
};
