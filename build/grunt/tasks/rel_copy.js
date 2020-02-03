module.exports = function (grunt) {
	grunt.config("copy", {
		release: {
			files: [
				// includes all production files
				{
					expand: true,
					cwd: "../",
					src: [
						"src/**/*",
						"languages/**/*",
						"<%= pkg.name %>.php",
						"index.php",
						"readme.txt",
						"vendor/**/*",
						"assets/**/*",
						"!**/node_modules/**"
					],
					dest: "dist/<%= pkg.name %>/"
				}
			]
		}
	});

	grunt.loadNpmTasks("grunt-contrib-copy");
};
