module.exports = (grunt) ->

  grunt.initConfig

    sass:
      compile:
        files: [
          'css/style.css': 'css/scss/style.scss'
        ]

    watch:
      sass:
        files: 'css/scss/**/*.scss'
        tasks: ['sass']
      options:
        livereload: true

  # load plugins
  grunt.loadNpmTasks 'grunt-contrib-sass'
  grunt.loadNpmTasks 'grunt-contrib-watch'

  # tasks
  grunt.registerTask 'default', ['sass', 'watch']
