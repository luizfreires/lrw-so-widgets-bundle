/*jshint node:true */
module.exports = function( grunt ) {
'use strict';

	grunt.initConfig({

		// gets the package vars
		pkg: grunt.file.readJSON( 'package.json' ),


		pot: {
	      	options:{
		  		text_domain: 'lrw-so-widgets-bundle', // Your text domain. Produces my-text-domain.pot
			    dest: 'languages/', // directory to place the pot file
			    keywords: [ //WordPress localisation functions
		            '__:1',
		            '_e:1',
		            '_x:1,2c',
		            'esc_html__:1',
		            'esc_html_e:1',
		            'esc_html_x:1,2c',
		            'esc_attr__:1',
		            'esc_attr_e:1',
		            'esc_attr_x:1,2c',
		            '_ex:1,2c',
		            '_n:1,2',
		            '_nx:1,2,4c',
		            '_n_noop:1,2',
		            '_nx_noop:1,2,3c'
		        ],
		    },
		    files:{
		    	src:  [
					'**/*.php', // Include all files
					'!node_modules/**' // Exclude node_modules/
				],
		    	expand: true,
			}
		},

		// Make .pot files
		makepot: {
			dist: {
				options: {
					type: 'wp-plugin',
					potHeaders: {
						'report-msgid-bugs-to': 'https://wordpress.org/plugins/lrw-so-widgets-bundle/',
						'language-team': 'LANGUAGE <EMAIL@ADDRESS>'
					}
				}
			}
		},

		// Check text domain
		checktextdomain: {
			options:{
				text_domain: '<%= pkg.name %>',
				keywords: [
					'__:1,2d',
					'_e:1,2d',
					'_x:1,2c,3d',
					'esc_html__:1,2d',
					'esc_html_e:1,2d',
					'esc_html_x:1,2c,3d',
					'esc_attr__:1,2d',
					'esc_attr_e:1,2d',
					'esc_attr_x:1,2c,3d',
					'_ex:1,2c,3d',
					'_n:1,2,4d',
					'_nx:1,2,4c,5d',
					'_n_noop:1,2,3d',
					'_nx_noop:1,2,3c,4d'
				]
			},
			files: {
				src:  [
					'**/*.php', // Include all files
					'!node_modules/**' // Exclude node_modules/
				],
				expand: true
			}
		}
	});

	// Load NPM tasks to be used here
	grunt.loadNpmTasks( 'grunt-checktextdomain' );
	grunt.loadNpmTasks( 'grunt-wp-i18n' );
	grunt.loadNpmTasks( 'grunt-pot' );

	// default task
	grunt.registerTask( 'default', [
		'checktextdomain',
		'makepot'
	] );
};
