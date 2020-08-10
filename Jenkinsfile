pipeline {
    agent any 
    stages {
        stage('compile') {
           steps {
                bat "composer install"
                bat "copy .env.example .env /Y"
                bat "php artisan config:clear"
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
                bat "php artisan key:generate"
                bat "php artisan config:clear"
                bat "php artisan config:cache"
                bat 'php "vendor/phpunit/phpunit/phpunit" -c phpunit.xml'
            } 
        }
        stage('Generate Deployable') { 
            steps {
                bat 'if not exist ticketsFolder.zip powershell "Compress-Archive ../DevPep ticketsFolder.zip"'
            }
        }
    }
}
