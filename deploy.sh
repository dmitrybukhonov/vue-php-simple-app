#!/bin/bash

echo "Checking dependencies..."
if ! [ -x "$(command -v npm)" ]; then
  echo 'Error: npm is not installed.' >&2
  exit 1
fi

if ! command -v php &> /dev/null; then
    echo "PHP is not installed. Please install PHP to run the server."
    exit 1
fi


echo "Installing dependencies..."
cd frontend && npm install && npm run build

echo "Starting Vue.js server..."
npm run serve &

sleep 5

echo "Starting PHP server..."
cd .. && php -S localhost:8090