module.exports = function(grunt) {

	grunt.initConfig({

		pkg : grunt.file.readJSON('package.json'),

		// chech our JS
		jshint : {
			options : {
				"bitwise" : true,
				"browser" : true,
				"curly" : true,
				"eqeqeq" : true,
				"eqnull" : true,
				"esnext" : true,
				"immed" : true,
				"jquery" : true,
				"latedef" : true,
				"newcap" : true,
				"noarg" : true,
				"node" : true,
				"strict" : false,
				"trailing" : true,
				"undef" : true,
				"globals" : {
					"jQuery" : true,
					"alert" : true
				}
			},
			all : ['gruntfile.js', 'theme/js/scripts.js']
		},

		// concat and minify our JS
		uglify : {
			dist : {
				files : {
					'theme/js/scripts.min.js' : [
					//'bower_components/jquery/dist/jquery.min.js' , 
					//'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.min.js', 
					'theme/js/scripts.js' ]
				}
			}
		},

		// compile your sass
		sass : {
			dev : {
				options : {
					style : 'expanded'
				},
				src : 'sass/theme.scss',
				dest : 'theme/css/theme.css'
			},
			prod : {
				options : {
					style : 'compressed'
				},
				src : ['scss/main.scss'],
				dest : 'assets/css/main.css'
			}
		},

		// watch for changes
		watch : {
			scss : {
				files : ['sass/**/*.scss'],
				tasks : ['sass:dev', 'notify:scss']
			},
			js : {
				files : ['<%= jshint.all %>'],
				tasks : ['jshint', 'uglify', 'notify:js']
			}
		},
		// notify cross-OS
		notify : {
			scss : {
				options : {
					title : 'Grunt, grunt!',
					message : 'SCSS is all gravy'
				}
			},
			js : {
				options : {
					title : 'Grunt, grunt!',
					message : 'JS is all good'
				}
			},
			dist : {
				options : {
					title : 'Grunt, grunt!',
					message : 'Theme ready for production'
				}
			}
		},

		clean : {
			dist : {
				src : ['../dist'],
				options : {
					force : true
				}
			}
		},

		copyto : {
			dist : {
				files : [{
					cwd : '../',
					src : ['**/*'],
					dest : '../dist/'
				}],
				options : {
					ignore : ['../dist{,/**/*}', '../doc{,/**/*}', '../grunt{,/**/*}', '../scss{,/**/*}']
				}
			}
		},
		express : {
			all : {
				options : {
					port : 9000,
					hostname : "0.0.0.0",
					bases : ['theme'], // Replace with the directory you want the files served from
					// Make sure you don't use `.` or `..` in the path as Express
					// is likely to return 403 Forbidden responses if you do
					// http://stackoverflow.com/questions/14594121/express-res-sendfile-throwing-forbidden-error
					livereload : true
				}
			}
		},
		open : {
			all : {
				// Gets the port from the connect configuration
				path : 'http://localhost:<%= express.all.options.port%>'
			}
		}
	});

	// Load NPM's via matchdep
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	// Development task
	grunt.registerTask('default', ['jshint', 'uglify', 'sass:dev']);
	// Server task
	grunt.registerTask('server', ['express', 'open', 'watch']);
	// Production task
	grunt.registerTask('dist', function() {
		grunt.task.run(['jshint', 'uglify', 'sass:prod', 'clean:dist', 'copyto:dist', 'notify:dist']);
	});
};
