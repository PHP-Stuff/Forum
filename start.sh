#!/bin/sh
initdb() {
  if ! [ -f "$1" ]; then
    echo "Creating $1..."
    printf "{}" > "$1"
}
if ! which php > /dev/null; then
  echo "Installing PHP..."
  sudo apt-get install php -y # adjust for your distro
fi
initdb users.json
initdb topics.json
echo "Starting server..."
php -s 0.0.0.0:8080
