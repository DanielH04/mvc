module.exports = {
	globDirectory: '.',
	globPatterns: [
		'**/*.{php,json,sql,png,js,xml,dist,xlsx,txt,css,jpg,gif,}'
	],
	swDest: 'sw.js',
	ignoreURLParametersMatching: [
		/^utm_/,
		/^fbclid$/
	]
};