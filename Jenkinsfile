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
