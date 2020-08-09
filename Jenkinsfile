pipeline {
    agent any 
    stages {
        stage('compile') {
           steps {
                bat 'composer install'
                bat "copy .env.example .env /Y"
                bat "php artisan config:clear"
                bat "php artisan config:cache"
            }
        }
        stage('build') {
             steps {
                bat 'if not exist "build/api" mkdir "build/api"'
                bat 'if not exist "build/logs" mkdir "build/logs"'
             }
        }
        stage('PHP STest') { 
            steps { 
                bat 'vendor/bin/parallel-lint --exclude vendor/ .' 
            } 
        }
    }
}
