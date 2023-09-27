#!/bin/bash

# Function to check if a command is available
command_exists() {
    command -v "$1" >/dev/null 2>&1
}

# Check if Composer is installed
if ! command_exists composer; then
    echo "Composer is not installed. Please install Composer (https://getcomposer.org/) first."
    exit 1
fi

# Check if PHP is installed
if ! command_exists php; then
    echo "PHP is not installed. Please install PHP (https://www.php.net/downloads.php) first."
    exit 1
fi


# Check if NODE is installed
if ! command_exists node; then
    echo "NODE is not installed. Please install NODE (https://nodejs.org/en/download) first."
    exit 1
fi

# Check if NPM is installed
if ! command_exists npm; then
    echo "NPM is not installed. Please install NPM (https://docs.npmjs.com/downloading-and-installing-node-js-and-npm) first."
    exit 1
fi

# Install Composer dependencies
composer install

# Install NPM
npm install

# PHP Generate Key
php artisan key:generate

# Run migration and seeder
php artisan db:wipe
php artisan migrate
php artisan db:seed

# Ask for the port to use or use the default (8000)
echo "Enter the port number to use for the Laravel development server (default: 8000):"
read -r port
if [ -z "$port" ]; then
    port=8000
fi

# Check if the specified port is in use
while true; do
    if command_exists nc; then
        if nc -z 127.0.0.1 "$port"; then
            echo "Port $port is already in use. Please choose another port:"
            read -r port
        else
            break
        fi
    else
        break
    fi
done

# Start the Laravel development server
php artisan serve --port="$port"

npm run dev

echo "Laravel development server is running on port $port. Press Ctrl+C to stop."
