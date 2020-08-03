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
                sh 'rm -rf build/api'
                sh 'rm -rf build/logs'
                sh 'mkdir build/api'
                sh 'mkdir build/logs'
             }
         }
        stage('PHP Syntax check') { 
            steps { 
                sh 'vendor/bin/parallel-lint --exclude vendor/ .' 
            } 
        }
    }
}
