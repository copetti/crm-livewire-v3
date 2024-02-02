import forms from '@tailwindcss/forms';
import typo from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
		"./resources/**/*.blade.php",
		 "./resources/**/*.js",
		 "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
	],
  theme: {
	extend: {},
  },
  plugins: [
		forms,
		typo,
		require("daisyui")
	],
	daisyui: {
		themes: [
			"light",
			"dark",
			"cupcake",
			"bumblebee",
			"emerald",
			"synthwave",
			"synthwave",
			"retro",
			"cyberpunk",
			"valentine",
			"halloween",
			"garden",
			"forest",
			"aqua",
			"lofi",
			"pastel",
			"fantasy",
			"wireframe",
			"black",
			"luxury",
			"dracula",
			"cmyk",
			"autumn",
			"business",
			"acid",
			"lemonade",
			"night",
			"coffee",
			"winter",
			"dim",
			"nord",
			"sunset",
		],
	}
}

