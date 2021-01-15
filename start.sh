#!/bin/sh
if ! which php > /dev/null; then
  echo "Installing PHP..."
  sudo apt-get install php -y # adjust for your distro
fi
echo "Starting server..."
php -s 0.0.0.0:8080
