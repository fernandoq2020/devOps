pipeline {
    agent any 
    stages {
        stage('compile') {
           steps {
                bat 'composer install'
            }
        }
        stage('build') {
             steps {
                bat 'rmdir build/api'
                bat 'rmdir build/logs'
                bat 'mkdir build/api'
                bat 'mkdir build/logs'
             }
        }
        stage('PHP Syntax check') { 
            steps { 
                bat 'vendor/bin/parallel-lint --exclude vendor/ .' 
            } 
        }
    }
}
