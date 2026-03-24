#!/bin/bash

# BioNeoMed WordPress - Replit Startup Script

# Ensure database directory exists
mkdir -p /home/runner/workspace/wp-content/database

# Run WordPress install if not already done (via WP-CLI or PHP)
echo "Starting BioNeoMed WordPress on port 5000..."

# Start PHP built-in server
exec php -S 0.0.0.0:5000 -t /home/runner/workspace /home/runner/workspace/wp-router.php
