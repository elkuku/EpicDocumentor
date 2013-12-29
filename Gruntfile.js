module.exports = function (grunt) {

    // Configuration goes here
    grunt.initConfig({

        pkg     : grunt.file.readJSON('package.json'),

        // Clean up
        clean   : ['build/<%= pkg.name %>'],

        // Configure the copy task to move files from the development to production folders
        copy    : {
            main: {
                files: {
                    'build/<%= pkg.name %>/': [
                        'docu_base/.gitignore',

                        'etc/**',
                        'src/**',
                        'tpl/**',

                        'vendor/**',
                        '!vendor/joomla/framework/**/Tests/**',

                        'www/custom/**',

                        'www/vendor/bootstrap/dist/**',

                        'www/vendor/epiceditor/epiceditor/**',

                        'www/vendor/jquery/jquery.js',
                        'www/vendor/jquery/jquery.min.js',
                        'www/vendor/jquery/jquery.min.map',

                        'www/.htaccess',
                        'www/favicon.ico',
                        'www/index.php',

                        'readme.md'
                    ]
                }
            }
        },

        // Zip everything up
        compress: {
            main: {
                options: {
                    archive: 'build/zips/<%= pkg.name %>_<%= pkg.version %>_alldeps.zip'
                },
                files  : [
                    {
                        expand: true,
                        cwd   : 'build/<%= pkg.name %>/',
                        src   : ['**', 'www/.htaccess', 'docu_base/.gitignore'],
                        dest  : '<%= pkg.name %>'
                    }
                ]
            }
        }

    });

    // Load plugins here
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-compress');

    // Define your tasks here
    grunt.registerTask(
        'default', [
            'clean', 'copy', 'compress'
        ]
    );

};
