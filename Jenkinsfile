pipeline {
    agent any 
    stages {
        stage('compile') {
           steps {
                bat 'composer install'
                bat "xcopy .env.example .env"
                bat "php artisan config:clear"
                bat "php artisan config:cache"
            }
        }
        stage('build') {
             steps {
                bat 'rmdir "build/api"'
                bat 'mkdir "build/api"'
                bat 'mkdir "build/logs"'
             }
        }
        stage('PHP STest') { 
            steps { 
                bat 'vendor/bin/parallel-lint --exclude vendor/ .' 
            } 
        }
    }
}
