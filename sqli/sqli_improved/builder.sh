#!/bin/bash

echo "---Building image..."
sudo docker build -t phpsqli . 


echo "---Compose up..."
sudo docker-compose up -d
